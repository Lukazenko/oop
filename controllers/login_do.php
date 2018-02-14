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


// küsime kasutaja andmed andmebaasist
$result = $db->getData($sql);

// kontrollime, kas andmed on olemas

if($result != false){



    //kasutajale tuleb avada töösessioon








    echo 'Oled sisselogitud<br />';
} else {
    $link = $http->getLink(array('control' => 'login'));
    $http->redirect($link);
}