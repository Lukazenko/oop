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
        $this->initConst();
    }

    // loeme vajalikud väärtused sisse

    function init(){
        $this->vars = array_merge($_GET, $_POST);
        $this->server = $_SERVER;
    }


    //loome vajalikud konstandid

    function initConst(){
        $constNames = array('HTTP_HOST', 'SCRIPT_NAME', 'REMOTE_ADDR');
        foreach ($constNames as $constName){
            if(!defined($constName) and isset($this->server[$constName])){
                define($constName, $this->server[$constName]);
            }
        }
    }

    //loome funktsiooni, mis loeb lingist andmed

    function get($name){
        if(isset($this->vars[$name])){
            return $this->vars[$name];

        }else{
            return false;
        }
    }

    // loome funktsiooni, mis paneb veebi paarid paika kujul nimi=väärtus

    function set($name, $value){
        $this->vars[$name] = $value;
    }

}