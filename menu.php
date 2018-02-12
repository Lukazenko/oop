<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/23/2018
 * Time: 11:04 AM
 */


$menu = new template('menu.menu');

// loome menüü elemendi malli objekti

$menuItem = new template('menu.menu_item');



// koostame päringu menüü ja sisu ülesehitamiseks kasutades utils.php loodud funktsiooni


$sql = 'SELECT content_id, content, title'.
    ' FROM content WHERE parent_id='.fixDb(0).
    ' AND show_in_menu='.fixDb(1);

// küsime andmed andmebaasist

$result = $db->getData($sql);

// ehitame menüü

if($result != false){
    foreach ($result as $page){
        $menuItem->set('menu_item_name', $page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $menuItem->set('link', $link);
        $menu->add('menu_items', $menuItem->parse());
    }
}

//lisame lisa elemendid, mis ei ole andmebaasist tulemas

// katsetamiseks lisan uue konstandi, mis määrab kasutaja id - sellest lähtun, kas kasutajale on võimalik
// antud menüü element näidata või mitte

define('USER_ID', 0); // mitte sisselogitud kasutaja

//näitame sisselogimist neile, kes ei ole sisselogitud

if(USER_ID == ROLE_NONE){
    $menuItem->set('menu_item_name', 'Logi sisse');
    $link = $http->getLink(array('control'=>'Login'));
    $menuItem->set('link', $link);
    $menu->add('menu_items', $menuItem->parse());

}









$mainTmpl->add('menu', $menu->parse());















