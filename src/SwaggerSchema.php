<?php

/**
 * @file
 * Contains telekurier\RetrescoClient\SwaggerSchema.
 */

namespace telekurier\RetrescoClient;

/**
 * Class SwaggerSchema.
 */
class SwaggerSchema {

  /**
   * Swagger definition.
   *
   * @var \stdClass
   */
  protected $json;

  /**
   * Constructs the object.
   *
   * @param string $url
   *   The url or path to the swagger.json file.
   */
  public function __construct($url) {
    $this->json = json_decode(file_get_contents($url));
  }

  /**
   * Gets the defined properties for the given schema type.
   *
   * @param string $type
   *   The name of the swagger type definition.
   *
   * @return array|null
   *   An array of property definitions as defined in swagger.json, keyed by
   *   property name; or NULL if the type is not known.
   */
  public function getTypeDefinition($type) {
    if (isset($this->json->definitions->{$type})) {
      return $this->json->definitions->{$type};
    }
  }

}
