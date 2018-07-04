<?php

namespace Drupal\ip_anonymisation_helper\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class IpAnonymisationController
 *
 * @package Drupal\ip_anonymisation_helper\Controller
 */
class IpAnonymisationController extends ControllerBase {

  /**
   * Returns a client ip.
   */
  public function getClientIp() {
    // Only expose the client IP if it's enabled.
    $config = \Drupal::config('ip_anonymisation_helper.settings');
    $expose_client_ip = $config->get('expose_client_ip');
    if ($expose_client_ip == TRUE) {
      $client_ip = _ip_anonymisation_helper_get_client_ip();
      return new JsonResponse(['client_ip' => $client_ip]);
    }
    else {
      $response = new JsonResponse();
      $response->setStatusCode(502);
      return $response;
    }
  }

}
