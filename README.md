# ip_anonymisation_helper
A Drupal 8 module that exposes the client IP to `/ip_anonymisation_helper/client_ip` path to be used to filter internal traffic out of analytics while still anonymising the visitor IP stored in analytics.

The separate path is used instead of exposing the IP on the page as markup so that's simpler to set as not to be cached compared to a part of markup of a page for example.
