<?php

/**
 * @file
 * Contains \telekurier\RetrescoClient\Normalizer\SwaggerSchemaNormalizer.
 */

namespace telekurier\RetrescoClient\Normalizer;

use telekurier\RetrescoClient\SwaggerSchema;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Normalizer for quotes.
 */
class SwaggerSchemaNormalizer extends ObjectNormalizer {

  /**
   * The swagger model classes namespace.
   *
   * @var string
   */
  protected $namespace;

  /**
   * The swagger schema.
   *
   * @var \telekurier\RetrescoClient\SwaggerSchema
   */
  protected $schema;

  /**
   * Sets the swagger schema to use.
   *
   * @param string $namespace
   *   The namespace under which the schema's types are generated.
   * @param \telekurier\RetrescoClient\SwaggerSchema $schema
   *   The swagger schema to use.
   *
   * @return $this
   */
  public function setSwaggerSchema($namespace, SwaggerSchema $schema) {
    $this->namespace = $namespace;
    $this->schema = $schema;
    return $this;
  }

  /**
   * Returns the property definitions for the given class.
   *
   * @param string $class
   *   The full fqdn class name.
   *
   * @return array[]|null
   *   An array of property definitions, or NULL if no schema can be found.
   */
  protected function getClassPropertyDefinitions($class) {
    if (strpos($class, $this->namespace) === 0) {
      $reflect = new \ReflectionClass($class);
      if (($type_definition = $this->schema->getTypeDefinition($reflect->getShortName())) && $type_definition->type == 'object') {
        return $type_definition->properties;
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($data, $format = NULL) {
    // If there is schema for the object's class, it is supported.
    return is_object($data) && (bool) $this->getClassPropertyDefinitions(get_class($data));
  }

  /**
   * {@inheritdoc}
   */
  public function supportsDenormalization($data, $type, $format = null) {
    return (bool) $this->getClassPropertyDefinitions($type);
  }

  /**
   * {@inheritdoc}
   */
  public function denormalize($data, $class, $format = NULL, array $context = array()) {
    if (isset($data)) {
      // For each property that is an object, or a list of object - take care of
      // nested object serialization and pre-process data accordingly.
      $property_definitions = $this->getClassPropertyDefinitions($class);
      foreach ($data as $name => $value) {
        if (isset($property_definitions->{$name}->{'$ref'})) {
          $type = str_replace('#/definitions/', $this->namespace . '\\', $property_definitions->{$name}->{'$ref'});
          $data[$name] = $this->serializer->denormalize($value, $type);
        }
        elseif (isset($property_definitions->{$name}->type) && $property_definitions->{$name}->type == 'array'
          && isset($property_definitions->{$name}->items->{'$ref'})) {
          $type = str_replace('#/definitions/', $this->namespace . '\\', $property_definitions->{$name}->items->{'$ref'}) . '[]';
          $data[$name] = $this->serializer->denormalize($value, $type);
        }
      }
      // Filter NULL properties.
      $data = array_filter($data, function ($value) {
        return isset($value);
      });
    }
    // Continue with regular normalization.
    return parent::denormalize($data, $class, $format, $context);
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = array()) {
    $data = parent::normalize($object, $format, $context);
    // Filter NULL properties.
    $data = array_filter($data, function ($value) {
      return isset($value);
    });
    return $data;
  }

}
