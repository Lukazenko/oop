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
define('LIB_DIR', 'lib/');
define('DEFAULT_CONTROL', 'default');




// nõuame abifunktsiooni faili kasutamist

require_once LIB_DIR.'utils.php';



// määrame erinevad rollid sisselogimiseks

define('ROLE_NONE', 0);
define('ROLE_USER', 1);
define('ROLE_ADMIN', 2);


// nõuame vajalike failide kasutamist

require_once MODEL_DIR.'template.php';
require_once MODEL_DIR.'http.php';
require_once MODEL_DIR.'linkobjekt.php';
require_once MODEL_DIR.'mysql.php';

//kutsun konstandid kasutusele db_conf.php failist

require_once 'db_conf.php';




// loome objektid, mis oleks vaja pidevalt kasutada

$http = new linkobjekt(); // kutsub linkobjekti


// loome andmebaasi objekti

$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);
