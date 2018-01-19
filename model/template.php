<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/19/2018
 * Time: 10:21 AM
 */

class template
{
    // klassi omadused

    var $file = ''; // HTML malli faili nimi
    var $content = false; // HTML malli failist loetud sisu
    var $vars = array(); // HTML malli elementide ja reaalväärtuste paarid

    // HTML malli failist sisu lugemine

    function readFile($file){
        $fp = fopen($file, 'r');
        $this->content = fread($fp, filesize($file));
        fclose($fp);

        // või teine variant:

        // $this->content = file_get_contents($file);

    }

}