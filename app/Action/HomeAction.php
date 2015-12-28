<?php
namespace App\Action;

final class HomeAction extends BaseAction
{
  // demo action
  public function Index($request, $response, $args){
    $args['seo_title'] = 'Title Index';
    $args['seo_description'] = 'Description Index';
    return $this->view->render($response, 'index.html', $args);
    // return $response;
  }
}