<?php

class Database{

    private $host = 'localhost';
    private $db_name = 'putnoosiguranje';
    private $username = 'root';
    private $password = '';
    public $konekcija;

    public function __construct(){
        $this->konekcija = null;

        try { 
            $this->konekcija = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Greska sa povezivanjem sa bazom : ' . $e->getMessage();
        }

        return $this->konekcija;
      
    }



}



$database = new Database();







?>