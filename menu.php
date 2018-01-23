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

echo $menuItemTmpl->parse();