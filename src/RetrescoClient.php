<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient;

use telekurier\RetrescoClient\Model\ElasticSearchRawResult;
use telekurier\RetrescoClient\Model\ElasticSearchResult;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\Model\RetrescoDocuments;

/**
 * Retresco REST client class.
 */
interface RetrescoClient {

  /**
   * Get the list of white listed Retresco entities.
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoEntityLinks
   *   Entity links.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   *
   */
  public function getEntityLinksMap();

  /**
   * Enriches the document on the server.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument $document
   *   The Retresco document.
   * @param bool $inTextLinks
   *   Enables calculation of In-Text-Links
   *   (default: false).
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoDocument
   *   Enriched document.
   *
   * @internal param bool $index Index document.
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function enrichDocument(RetrescoDocument $document, $inTextLinks);

  /**
   * Execute a bulk operation.
   *
   * @param array $actions
   *   A list of actions to process in bulk. Split up data into chunks according
   *   to recommended bulk operation size (see below).
   *
   * @return mixed|\Psr\Http\Message\ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   *
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MIN_RECOMMENDED_BULK_OPERATIONS
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MAX_RECOMMENDED_BULK_OPERATIONS
   */
  public function bulkOperation(array $actions);

  /**
   * Puts the document on the server.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument $document
   *   The Retresco document.
   *
   * @return mixed|\Psr\Http\Message\ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function putDocument(RetrescoDocument $document);

  /**
   * Index documents in bulk.
   *
   * Recommended between 1000 and 5000 documents depending on the Elasticsearch
   * server configuration.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument[] $documents
   *   The Retresco documents. Split up data into chunks according to
   *    recommended bulk operation size (see below).
   *
   * @return mixed|\Psr\Http\Message\ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   *
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MIN_RECOMMENDED_BULK_OPERATIONS
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MAX_RECOMMENDED_BULK_OPERATIONS
   */
  public function putDocuments(array $documents);

  /**
   * Gets the document for the given remote id.
   *
   * @param int $id
   *   The remote id of the document.
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoDocument
   *   RetrescoDocument object.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function getDocumentById($id);

  /**
   * Deletes the document.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument $document
   *   RetrescoDocument.
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function deleteDocument(RetrescoDocument $document);

  /**
   * Deletes documents in bulk.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument[] $documents
   *   The documents to delete. Split up data into chunks according to
   *   recommended bulk operation size (see below).
   *
   *   @return \Psr\Http\Message\ResponseInterface
   *   ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\ClientException
   *
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MIN_RECOMMENDED_BULK_OPERATIONS
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MAX_RECOMMENDED_BULK_OPERATIONS
   */
  public function deleteDocuments(array $documents);

  /**
   * Deletes the document for the given remote id.
   *
   * @param int $id
   *   The remote document id.
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function deleteDocumentById($id);

  /**
   * Deletes documents in bulk given the Elasticsearch document id.
   *
   * @param string[] $ids
   *   List of Doc ids. Split up data into chunks according to recommended bulk
   *   operation size (see below).
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\ClientException
   *
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MIN_RECOMMENDED_BULK_OPERATIONS
   * @see \telekurier\RetrescoClient\RetrescoClientImpl::MAX_RECOMMENDED_BULK_OPERATIONS
   */
  public function deleteDocumentsById(array $ids);

  /**
   * Get Related Documents
   *
   * @param string $id
   *   Document ID.
   * @param string $doc_types
   *   Document type.
   * @param mixed $options
   *   See
   *    https://kurier-stage01.rtrsupport.de/ui/manual-docs/api_relateds.html.
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoDocuments
   *   RetrescoDocuments object.
   */
  public function getRelatedDocuments($id, $doc_types, $options = NULL);

  /**
   * Get Topic Page object from Retresco.
   *
   * @param string $topicPageId
   *   ID of topic page
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoTopicPage
   *   Topic page
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getTopicPage($topicPageId);

  /**
   * Get Documents for given topic page.
   *
   * @see https://kurierat.rtrsupport.de/ui/manual-docs/api_topic_pages_documents.html
   *
   * @param string $topicPageId
   *   ID of topic page
   * @param int $rows
   *   Number of results
   * @param int $page
   *   For pagination
   * @param string $sort_by
   *   "date" or "relevance"
   * @param null|string $filter
   *   Named filter (optional).
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoDocuments
   *   Documents
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getTopicPageDocuments(string $topicPageId,
                                        int $rows,
                                        int $page,
                                        string $sort_by,
                                        ?string $filter = NULL): RetrescoDocuments;

  /**
   * Related Topic Pages.
   *
   * @param string $topicPageId
   *    ID of topic page
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoTopicPages
   *   Topic pages
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function relatedTopicPages(string $topicPageId);

  /**
   * Get Topic Pages object from Retresco as result of search.
   *
   * @param string $phrase
   *   Searched phrase.
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoTopicPages
   *   RetrescoTopicPages object.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function topicPagesTypeAhead($phrase);

  /**
   * @param $query mixed
   *   Elasticsearch query as associative array
   *
   * @return \telekurier\RetrescoClient\Model\ElasticSearchRawResult
   *   Raw result.
   *
   * @throws \Exception
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function poolSearch($query): ElasticSearchRawResult;

  /**
   * @param $query mixed
   *   Elasticsearch query as associative array
   *
   * @return \telekurier\RetrescoClient\Model\ElasticSearchAggregation[]
   *   Aggregations.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function poolSearchAggregations($query): array;

  /**
   * @param $query mixed
   *   Elasticsearch query as associative array
   *
   * @return \telekurier\RetrescoClient\Model\ElasticSearchResult
   *   Search result.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function poolSearchResult($query): ElasticSearchResult;

  /**
   * @param mixed $data
   *    Any data.
   * @param string $type
   *    Type of deserialized object.
   *
   * @return object
   *    Deserialized object.
   */
  public function deserialize(string $data, string $type): object;

  /**
   * @param mixed $data
   *   The data to serialize.
   *
   * @return string
   *   Serialized data as string.
   */
  public function serialize($data);
}
