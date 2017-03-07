<?php
/**
 * Created by IntelliJ IDEA.
 * User: az
 * Date: 14/09/16
 * Time: 12:28
 */

namespace telekurier\RetrescoClient;

use telekurier\RetrescoClient\Model\RetrescoSearchQuery;

class RetrescoQueryBuilder {

  protected $query;

  /**
   * RetrescoQueryBuilder constructor.
   */
  public function __construct() {
    $this->query = new RetrescoSearchQuery();
    $this->setDefaults();
  }

  protected function setDefaults() {

  }

  /**
   * @return \telekurier\RetrescoClient\Model\RetrescoSearchQuery
   */
  public function getQuery(): RetrescoSearchQuery {
    return $this->query;
  }
}
