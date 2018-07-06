(function () {
  var xhr = new XMLHttpRequest();
  // Request the client IP from the endpoint made available by the module itself.
  xhr.open('GET', '/ip_anonymisation_helper/client_ip');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Expose the client IP to a global variable.
      ip_anonymisation_helper = JSON.parse(xhr.responseText);
    }
  };
  xhr.send();
})();