# furry_octo_bassoon
A Drupal 8 module that exposes the client IP to the head section as a script tag.

Uses a custom function for a best guess of the IP instead of relying on [`Request::getClientIp`](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21Request.php/function/Request%3A%3AgetClientIp/8.5.x) nor [`Request::getClientIps`](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21Request.php/function/Request%3A%3AgetClientIps/8.5.x) because those seem to be unreliable and returning the host server IP instead of the client IP in some cases.
