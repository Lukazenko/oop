<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 2/2/2018
 * Time: 10:50 AM
 */

class mysql
{
    var $conn = false;  // ühendus andmebaasi serveriga
    var $host = false;  // serveri nimi IP
    var $user = false;  // kasutajanimi
    var $pass = false;  // kasutaja parool
    var $dbname = false;  // andmebaasi nimi

    /**
     * mysql constructor.
     * @param bool $host
     * @param bool $user
     * @param bool $pass
     * @param bool $dbname
     */
    public function __construct($host, $user, $pass, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->connect(); //ühenduse loomine
    }

    // funktsioon ühenduseks andmebaasi serveriga

    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this -> pass, $this->dbname);
        if($this->conn == false){
            echo 'Probleem ühendusega!<br />';
            exit;
        }
    }

    // esitame päringu

    function query($sql){
        $result = mysqli_query($this->conn, $sql);
        if($result == false){
            echo 'Probleem päringuga<br />';
            echo '<b>'.$sql.'</b>';
            return false;
        }

        return $result;
    }



}