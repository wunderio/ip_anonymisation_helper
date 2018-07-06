(function ($, Drupal) {
  Drupal.behaviors.clientIpFetcher = {
    attach: function () {
      // Request the client IP.
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '/ip_anonymisation_helper/client_ip');
      xhr.onload = function() {
        if (xhr.status === 200) {
          var data = JSON.parse(xhr.responseText);
          if (typeof drupalSettings == 'undefined') {
            var drupalSettings = {};
          }
          drupalSettings.ip_anonymisation_helper = {
            client_ip: data['client_ip']
          };
        }
      };
      xhr.send();
    }
  }
})(jQuery, Drupal);