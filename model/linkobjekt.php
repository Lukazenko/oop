<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 1/23/2018
 * Time: 12:52 PM
 */

class linkobjekt extends http
{
    var $baseLink = false; // põhilink
    var $protocol = 'http://';
    var $eq = '=';
    var $delim = '&amp';

    /**
     * linkobjekt constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->baseLink = $this->protocol.HTTP_HOST.SCRIPT_NAME;
        echo $this->baseLink;
    }

}