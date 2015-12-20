<?php
namespace App\Action;

final class HomeAction
{
  private $view;

  public function __construct($view){
    $this->view = $view;
  }

  public function Index($request, $response, $args){
    $args['seo_title'] = 'Title Index';
    return $this->view->render($response, 'index.html', $args);
    // return $response;
  }
}