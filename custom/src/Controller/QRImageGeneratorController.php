<?php

namespace Drupal\custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\custom\Response\QRImageResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Controller which generates the image from defined settings.
 */
class QRImageGeneratorController extends ControllerBase {

  /**
   * Request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $request;

  /**
   * QRImageGeneratorController constructor.
   *
   * @param \Symfony\Component\HttpFoundation\RequestStack $request
   *   Request object to get request params.
   */
  public function __construct(RequestStack $request) {
    $this->request = $request;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('request_stack')
    );
  }

  /**
   * LogoWidth.
   *
   * @return int
   *   Will return the logo width.
   */
  public function getLogoWidth() {
    return $this->config('custom.settings')->get('logo_width');
  }

  /**
   * LogoSize.
   *
   * @return int
   *   Will return the logo size.
   */
  public function getLogoSize() {
    return $this->config('custom.settings')->get('set_size');
  }

  /**
   * LogoMargin.
   *
   * @return int
   *   Will return the logo margin.
   */
  public function getLogoMargin() {
    return $this->config('custom.settings')->get('set_margin');
  }

  /**
   * Will return the response for external url.
   *
   * @return \Drupal\custom\Response\QRImageRespons
   *   Will return the image response.
   */
  public function withUrl() {
    $externalUrl = $this->request->getCurrentRequest()->query->get('path');
    return new QRImageResponse($externalUrl, $this->getLogoWidth(), $this->getLogoSize(), $this->getLogoMargin());
  }

}
