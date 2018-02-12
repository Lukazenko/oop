<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 2/12/2018
 * Time: 8:56 AM
 */

//loome sisselogimiseks vormi objekt

$loginForm = new template('login');

// paneme paika väärtused malli sisustamiseks

$loginForm->set('kasutaja', 'Kasutajanimi');
$loginForm->set('parool', 'Kasutaja parool');
$loginForm->set('nupp', 'Logi sisse!');

//loome lingi vormi töötluseks

$link = $http->getLink(array('control'=>'login_do'));
$loginForm->set('link', $link);

// paneme väärtused malli
// selleks oleks vaja trükkida sisse logimisvorm {content} elemendis

$mainTmpl->set('content', $loginForm->parse());

