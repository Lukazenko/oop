<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 2/14/2018
 * Time: 2:53 PM
 */

class session
{
    var $sid = false; // sessiooni id
    var $vars = array(); // sessioni ajal tekkinud andmed
    var $http = false; // $http objekti jaoks
    var $db = false; // $db objekti jaoks
    var $timeout = 1800; // 30 minutit sessiooni pikkus (sekundites 1800)
    var $anonymous = true; // anonüümne session

    /**
     * session constructor.
     * @param bool $http
     * @param bool $db
     */
    public function __construct(&$http, &$db) // & teeb otse ühenduse muutujaga nagu viide. aadress kus on salvestatud
    {
        $this->http = &$http;
        $this->db = &$db;
        //$this->sessionCreate();
        //$this->clearSession(); et clearida

        $this->sid = $http->get('sid');
        $this->checkSession();
    }

    // loome sessiooni

    function sessionCreate($user = false){
        // kui kasutaja on anonüümne
        if($user == false){
            //tekitame kasutaja andmed andmebaasi jaoks
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonüümne'
            );
            // loome sid
            $sid = md5(uniqid(time().mt_rand(1,1000), true));

            // salvestamine andmed session tabelisse
            $sql = 'INSERT INTO session SET '.
                'sid='.fixDb($sid).', '.
                'user_id='.fixDb($user['user_id']).', '.
                'user_data='.fixDb(serialize($user)).', '.
                'login_ip='.fixDb(REMOTE_ADDR).', '.
                'created=NOW()';

            // saadame päring andmebaasi
            $this->db->query($sql);
            // määrame sid $this->sid
            $this->sid = $sid;
            // lisame andmed $http objekti sisse
            // et nad oleks veebis kätte saadavad

            $this->http->set('sid', $sid);
        }
    }

    // kustutame sessioni logid, mis on pikemad kui 30 minutit

    function clearSession(){
        $sql = 'DELETE FROM session WHERE '.
            time().' - UNIX_TIMESTAMP(changed) > '.
            $this->timeout;
        $this->db->query($sql);
    }


    // sessioni andmete kontroll

    function checkSession(){
        $this->clearSession();
        // kui sid pole ja on lubatud anonüümne kasutaja
        if($this->sid === false and $this->anonymous){
            $this->sessionCreate();
        }

        // kui sid on juba olemas

        if($this->sid !== false){
            // loeme kõik andmed, mis on antud sessiooniga seotud
            $sql = 'SELECT * FROM session WHERE'.
                'sid='.fixDb($this->sid);
            $result = $this->db->getData($sql);
            if($result == false){
                // siis vaatame, kui anonüümne kasutaja on lubatud
                if($this->anonymous){
                    // loome anonüümne session
                    $this->sessionCreate();
                    define('USER_ID', 0);
                    define('ROLE_ID', 0);
                }else{
                    //kui anonüümne ei ole lubatud
                    $this->sid = false;
                    // nüüd tuleb kustutada sid ka $http objektist
                    // veel ei ole lahendatud
                }
            } else {
                // saime andmed andmebaasist
                // valmistame andmetest sessiooni andmed
                $vars = unserialize($result[0]['svars']);
                // kui andmed ei ole massiivi kujul siis teisendan need massiiviks

                if(!is_array($vars)){
                    $vars = array();
                }
                $this->vars = $vars;
                //kasutaja andmete töötlus

                $user_data = unserialize($result[0]['user_data']);
                define('USER_ID', $user_data['user_id']);
                define('ROLE_ID', $user_data['role_id']);
                $this->user_data = $user_data;
            }
        } else {
            define('USER_ID', 0);
            define('ROLE_ID', 0);
        }
    }




}