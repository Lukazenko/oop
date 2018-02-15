<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/23/2018
 * Time: 12:52 PM
 */

// siin saab linki muuta


class linkobjekt extends http
{
    var $baseLink = false; // põhilink
    var $protocol = 'http://';
    var $eq = '=';
    var $delim = '&amp;';
    var $aie = array('sid');  // lingi kohustuslikud lisandid

    /**
     * linkobjekt constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->baseLink = $this->protocol.HTTP_HOST.SCRIPT_NAME; // HTTP_HOST = ikt.khk.ee ja SCRIPT_NAME = /oop/index.php
        // echo $this->baseLink;
    }

    // loome paarid kujul nimi=väärtus
    // ühendame need ka kokku nimi1=väärtus1&nimi2=väärtus2

    function addToLink(&$link, $name, $value){
        if($link != ''){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($value);
        // echo $link.'<br />';
    }

    function getLink($add = array(),$aie = array()){
        $link = ''; // lingi loomiseks vajalik muutuja
        foreach ($add as $name => $value){
            //kõigepealt koostame paaride komplektid
            $this->addToLink($link, $name, $value);
        }

        foreach ($aie as $name){
            $value = $this->get($name);

            if($value != false){
                $this->addToLink($link, $name, $value);
            }


        }

        foreach ($this->aie as $name){
            $value = $this->get($name);

            if($value != false){
                $this->addToLink($link, $name, $value);
            }
        }

        if($link != ''){
            $link = $this->baseLink.'?'.$link;
        } else {
            $link = $this->baseLink;
        }

        return $link;
    }

}


