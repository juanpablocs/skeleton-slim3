<?php
namespace App\Action;

final class ErrorAction
{
  private $view;
  private $settings;

  public function __construct($view, $settings){
    $this->view = $view;
    $this->settings = $settings;
  }

  public function Error404($request, $response){
    $args = [];
    $args['seo_title'] = $this->settings['seo_title'];
    $args['seo_description'] = $this->settings['seo_description'];
    return $this->view->render($response, 'error404.html', $args)->withStatus(404);
  }
}