<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 2/12/2018
 * Time: 9:51 AM
 */



// vormi poolt tulnud andmed

$username = $http->get('username');
$password = $http->get('password');

// kontrollime nende sisu
//echo $username.'<br />';
//echo $password.'<br />';

//koostame päring kasutaja kontrollimiseks

$sql = 'SELECT * FROM user'.' WHERE username='.fixDb($username).
    ' AND password='.fixDb(md5($password));



$result = $db->getData($sql);

echo '<pre>';
print_r($result);
echo '</pre>';