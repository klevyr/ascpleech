<?php
namespace Portabilidad\Controllers;

class BaseController {
    var $l = null;
    
    function __construct() {
        //Session::init();
        //$this->view = new \Ant\View();
        $this->l = new \Katzgrau\KLogger\Logger(dirname(dirname(__DIR__)).'/logs');
    }
    
}
