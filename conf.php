<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/19/2018
 * Time: 9:45 AM
 */

// kaustade ja failide konstantsed nimetused

define('MODEL_DIR', 'model/');
define('VIEW_DIR', 'views/');
define('CONTROL_DIR', 'controllers/');


// nõuame vajalike failide kasutamist

require_once MODEL_DIR.'template.php';
require_once MODEL_DIR.'http.php';

// loome objektid, mis oleks vaja pidevalt kasutada

$http = new http();
