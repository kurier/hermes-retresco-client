<?php

/**
 * @file
 * Contains \drunomics\RetrescoClient\AuthenticationMiddleware.
 */

namespace drunomics\RetrescoClient;

use Psr\Http\Message\RequestInterface;

/**
 * Handles authentication via the login service.
 *
 * This class serves as Middleware for Guzzle6 clients.
 */
class AuthenticationMiddleware {

  /**
   * The XTRF session id token.
   *
   * @var string
   */
  protected $session_id;

  /**
   * The xtrf client.
   *
   * @var RetrescoClient
   */
  protected $client;

  /**
   * Object constructor.
   *
   * @param \drunomics\RetrescoClient\RetrescoClient
   *   The xtrf client.
   */
  public function __construct(RetrescoClient $client) {
    $this->client = $client;
  }

  /**
   * Called when the middleware is handled.
   *
   * @param callable $handler
   *   The Guzzle handler.
   *
   * @return \Closure
   */
  public function __invoke(callable $handler) {

    return function (RequestInterface $request, array $options) use ($handler) {
      // Allow to opt-out by setting the auth option to false.
      // @see RetrescoClient::login().
      if (!isset($options['auth']) || $options['auth'] !== FALSE) {
        // Just make sure there is a valid session and add it to the header.
        $request = $request->withAddedHeader('Cookie', 'JSESSIONID=' . $this->getSessionId());
      }
      return $handler($request, $options);
    };
  }

  /**
   * Gets session id.
   *
   * Triggers login if session id is not present.
   *
   * @return string
   *   The session id.
   */
  protected function getSessionId() {
    if (empty($this->session_id)) {
      $config = $this->client->getConfig();
      $this->session_id = $this->client->login($config['username'], $config['password']);
    }
    return $this->session_id;
  }

}
