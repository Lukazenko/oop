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




}