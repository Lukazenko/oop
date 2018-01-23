<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/23/2018
 * Time: 12:22 PM
 */

class http
{
    // klassi muutujad

    var $vars = array(); // HTTP andmete massiiv ($_GET, $_POST)
    var $server = array(); // serveri andmete massiiv ($_SERVER)

    /**
     * http constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    // loeme vajalikud väärtused sisse

    function init(){
        $this->vars = array_merge($_GET, $_POST);
        $this->server = $_SERVER;
    }

}