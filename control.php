<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/31/2018
 * Time: 9:37 AM
 */

// saame teada millise nimega kontrollerit on vaja

$control = $http->get('control');

$file = CONTROL_DIR.$control.'.php';
if(file_exists($file) and is_file($file) and is_readable($file)){
    require_once $file;
} else {
    $file = CONTROL_DIR.DEFAULT_CONTROL.'.php';
    require_once $file;

}


