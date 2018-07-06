<?php

namespace Drupal\ip_anonymisation_helper\Controller;

use Drupal\Core\Config\Config;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class IpAnonymisationController
 *
 * @package Drupal\ip_anonymisation_helper\Controller
 */
class IpAnonymisationController extends ControllerBase {

  /**
   * The ip_anonymisation_helper.settings config object.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $config;

  /**
   * A request object.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $request;

  /**
   * IpAnonymisationController constructor.
   *
   * @param \Drupal\Core\Config\Config $config
   * @param \Symfony\Component\HttpFoundation\Request $request
   */
  public function __construct(Config $config, Request $request) {
    $this->config = $config;
    $this->request = $request;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')->get('ip_anonymisation_helper.settings'),
      $container->get('request_stack')->getCurrentRequest()
    );
  }

  /**
   * Returns a client ip.
   */
  public function getClientIp() {
    // Only expose the client IP if it's enabled.
    $expose_client_ip = $this->config->get('expose_client_ip');
    if ($expose_client_ip == TRUE) {
      $client_ip = $this->request->getClientIp();
      return new JsonResponse([
        'event' => 'Client IP Received',
        'client_ip' => $client_ip,
      ]);
    }
    else {
      $response = new JsonResponse();
      $response->setStatusCode(502);
      return $response;
    }
  }

}
