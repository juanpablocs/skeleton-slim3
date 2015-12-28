<?php
namespace App\Action;

final class HomeAction extends BaseAction
{

  public function Index($request, $response, $args){
    $args['seo_title'] = 'Title Index';
    return $this->view->render($response, 'index.html', $args);
    // return $response;
  }
}