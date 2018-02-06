<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/31/2018
 * Time: 9:47 AM
 */





$page_id = (int)$http->get('page_id');


// lehe id järgi küsime sisu andmebaasist

$sql = 'SELECT * FROM content'.
    ' WHERE content_id='.fixDb($page_id);

// küsime vajalikud andmed andmebaasist
$result = $db->getData($sql);

// kui vaatavale page_id-le ei leidu andmebaasis vastust

if($result == false) {
    //siis pöördume avalehele first page
    $sql = 'SELECT * FROM content WHERE ' .
        'is_first_page='.fixDb(1);
    $result = $db->getData($sql);
}

if($result != false){
    //siis tulemus koosneb ainult ühest reast ja see ongi vastava lehe sisu
    $page = $result[0];
    $http->set('page_id', $page['content_id']);
    $mainTmpl->set('content', $page['content']);
}

