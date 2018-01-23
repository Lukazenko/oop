<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/19/2018
 * Time: 11:09 AM
 */


// loeme sisse projekti konfiguratsiooni

require_once 'conf.php';

// loome test objekti template klassist

$mainTmpl = new template('main');

// määrame reaalväärtused malli elementidele

$mainTmpl->set('lang','et');
$mainTmpl->set('page_title','Lehe pealkiri');
$mainTmpl->set('user','Kasutaja');
$mainTmpl->set('title','Pealkiri');
$mainTmpl->set('lang_bar','Keeleriba');
// katsetame menüü loomist
require_once 'menu.php';
$mainTmpl->set('content','Lehe sisu');

echo $mainTmpl->parse();


// katsetame menüü loomist

require_once 'menu.php';

// testvaade konstandid

echo HTTP_HOST.SCRIPT_NAME;