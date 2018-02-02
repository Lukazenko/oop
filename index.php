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
require_once 'control.php';

// määrame reaalväärtused malli elementidele

$mainTmpl->set('lang','et');
$mainTmpl->set('page_title','Lehe pealkiri');
$mainTmpl->set('user','Kasutaja');
$mainTmpl->set('title','Pealkiri');
$mainTmpl->set('lang_bar','Keeleriba');
// katsetame menüü loomist
require_once 'menu.php';

echo $mainTmpl->parse();


// katsetame menüü loomist

require_once 'menu.php';


// kontrollime andmebaasi objekti sisu et aru saada et on ühendus


$result = $db->getData('SELECT NOW()');

echo '<pre>';
print_r($result);
echo '</pre>';










