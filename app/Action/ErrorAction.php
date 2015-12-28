<?php
namespace App\Action;

final class ErrorAction extends BaseAction
{

  public function Error404($request, $response){
    $args = [];
    $args['seo_title'] = $this->settings['seo_title'];
    $args['seo_description'] = $this->settings['seo_description'];
    return $this->view->render($response, 'error404.html', $args)->withStatus(404);
  }
}