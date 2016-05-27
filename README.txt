# Retresco Client Library
REST client library based on Guzzle.

Notes on using swagger-UI:
--------------------------

- Run swagger-ui via "composer swagger-ui" command.

- Start with the authentication call. It's result needs to be copied into the
  api-key field at the top.

- The cookie authentication does not work from swagger. But the generated curl
  commands do. If you have troubles with SSL verification you can prepend the
  curl options:

  curl -3 --insecure  OTHER OPTIONS

Generate models based upon swagger spec
----------------------------------------

- Run `composer install` in the libraries directory
- Run `composer generate` - that's it.
