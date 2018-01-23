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





    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;  // määrame kasutatava malli faili nimi
        $this->loadFile();      // laadime määratud nimega faili sisu

    }














    // HTML malli faili nime ja õiguste kontroll ning sisu lugemine, kui tingimused on täidetud

    function loadFile(){
        if(!is_dir(VIEW_DIR)){
            echo 'Ei ole leitud '.VIEW_DIR.' kataloogi<br />';
            exit;
        }


        // kui faili nimi on määratud kujul views/failinimi.html

        $file = $this->file; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }



        // kui faili nimi on määratud kujul failinimi

        $file = VIEW_DIR.$this->file.'.html'; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        // kui fail asub alamkataloogis views/alamkaust/failinimi.html


        $file = VIEW_DIR.str_replace('.','/', $this->file).'.html'; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }

        // kui ikkagi sisu on puudu

        if($this->content === false){
            echo 'Ei suutnud lugeda '.$this->file.' sisu <br />';
            exit;
        }

    }



    // HTML malli failist sisu lugemise funtkstioon

    function readFile($file){
        $fp = fopen($file, 'r');
        $this->content = fread($fp, filesize($file));
        fclose($fp);

        // või teine variant, mis on ühe reaga:

        // $this->content = file_get_contents($file);

    }

    // malli elemendi nimi ja reaalväärtuse paari koostamine ja lisamine $this->vars massiivi sisse

    function set($name, $value){
        $this->vars[$name] = $value;
    }

    // täidame malli loetud sisu reaalsete väärtustega ja anname muutetud sisu tagasi põhiprogrammile

    function parse(){
        $str = $this->content; // malli sisu algväärtus
        foreach ($this->vars as $name=>$value){
            $str = str_replace('{'.$name.'}', $value, $str);
        }
        return $str;
    }

}