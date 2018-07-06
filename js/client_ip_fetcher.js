(function ($, Drupal) {
  Drupal.behaviors.clientIpFetcher = {
    attach: function () {
      $.getJSON('/ip_anonymisation_helper/client_ip', function(data) {
        drupalSettings.ip_anonymisation_helper = {};
        drupalSettings.ip_anonymisation_helper.client_ip = data['client_ip'];
      });
    }
  }
})(jQuery, Drupal);