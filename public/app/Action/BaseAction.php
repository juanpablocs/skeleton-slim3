<?php
namespace App\Action;

class BaseAction
{
  public $view;
  public $settings;
  
  public function __construct($c){
    $this->view = $c->get('view');
    $this->settings = $c->get('settings');
  }

}