<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/23/2018
 * Time: 11:04 AM
 */


$menuTmpl = new template('menu.menu');

// loome menüü elemendi malli objekti

$menuItemTmpl = new template('menu.menu_item');

// lisame avalehe

$menuItemTmpl->set('menu_item_name','Avaleht');


// loome lingi

$link = $http->getLink();
$menuItemTmpl->set('link',$link);


// täidame loodud elemndiga lehe menüü

$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);


// ********************************************************
// tegutseme ühe menüü elemendiga

$menuItemTmpl->set('menu_item_name','esimene');


// loome lingi

$link = $http->getLink(array('control' => 'esimene'));
$menuItemTmpl->set('link',$link);


// täidame loodud elemndiga lehe menüü

$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//*********************************************************

$menuItemTmpl->set('menu_item_name','teine');

// loome lingi

$link = $http->getLink(array('control' => 'teine'));
$menuItemTmpl->set('link',$link);

// täidame loodud elemndiga lehe menüü

$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//************************************************************


//***************************************************

// koostame valmis menüü vaate
$menu = $menuTmpl->parse();
// ja lisame antud vaate peamalli elemendile nimega {menu}
$mainTmpl->set('menu', $menu);

