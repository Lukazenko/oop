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

$testTabel = new template('test');

// määrame reaalväärtused malli elementidele

$testTabel->set('esimene','1');
$testTabel->set('teine','2');

// lisame objekti testvaade

echo '<pre>';
print_r($testTabel);
echo '</pre>';

echo $testTabel->parse();