# ip_anonymisation_helper
A Drupal 8 module that exposes the client IP to the head section as a script tag in order to filter internal traffic out of analytics while still anonymising the visitor IP stored in analytics.

Uses a custom function for a best guess of the IP instead of relying on [`Request::getClientIp`](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21Request.php/function/Request%3A%3AgetClientIp/8.5.x) nor [`Request::getClientIps`](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21Request.php/function/Request%3A%3AgetClientIps/8.5.x) because those seem to be unreliable and returning the host server IP instead of the client IP in some cases.
