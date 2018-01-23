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

// tegutseme ühe menüü elemendiga

$menuItemTmpl->set('menu_item_name','esimene');

echo '<pre>';
print_r($menuItemTmpl);
echo '</pre>';

// täidame loodud elemndiga lehe menüü

$menuItem = $menuItemTmpl->parse();
$menuTmpl->set('menu_items', $menuItem);

echo '<pre>';
print_r($menuTmpl);
echo '</pre>';


// koostame valmis menüü vaate
$menu = $menuTmpl->parse();
// ja lisame antud vaate peamalli elemendile nimega {menu}
$mainTmpl->set('menu', $menu);