# ip_anonymisation_helper
A Drupal 8 module that pushes the client IP to the dataLayer to be used to filter internal traffic out of analytics while still anonymising the visitor IP stored in analytics.

The client IP is get dynamically from an uncached path provided by the module to avoid any issues with caches sitting in front of Drupal like Varnish Cache.