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

$mainTmbl = new template('main');

// määrame reaalväärtused malli elementidele

$mainTmbl->set('lang','et');
$mainTmbl->set('page_title','Lehe pealkiri');
$mainTmbl->set('user','Kasutaja');
$mainTmbl->set('title','Pealkiri');
$mainTmbl->set('lang_bar','Keeleriba');
$mainTmbl->set('menu','Lehe menüü');
$mainTmbl->set('content','Lehe sisu');



// lisame objekti testvaade

echo '<pre>';
print_r($mainTmbl);
echo '</pre>';

echo $mainTmbl->parse();