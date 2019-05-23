<?php


    class Korisnik{

        protected static $db_table='korisnik_osiguranja';
        protected static $db_table_fields_osiguranje = array('ime_prezime_osiguranik', 'datum_rodjenja_osiguranik', 'broj_pasosa_osiguranik');

        public $id;
        public $ime_prezime;
        public $datumRodjenja;
        public $brPasosa;
        public $telefon;
        public $email;
        public $datumPolazak;
        public $datumPovratak;
        public $vrstaOsiguranja;
        public $datum_unosa;


        public $ime_prezime_osiguranik = array();
        public $datum_rodjenja_osiguranik = array();
        public $broj_pasosa_osiguranik = array();

        public $lastId;

        public $db;



        public function __construct($database){
            $this->db = $database->konekcija;

        }


        public function kreirajKorisnika(){
           
            $sql = "INSERT INTO korisnik_osiguranja(ime_prezime, datum_rodjenja, broj_pasosa, telefon, email, datum_od, datum_do, vrsta_osiguranja ) VALUES ( :ime_prezime, :datum_rodjenja, :broj_pasosa, :telefon, :email, :datum_od, :datum_do, :vrsta_osiguranja)";

            $query = $this->db->prepare($sql);

            $query->bindParam(':ime_prezime', $this->ime_prezime);
            $query->bindParam(':datum_rodjenja', $this->datumRodjenja);
            $query->bindParam(':broj_pasosa', $this->brPasosa);
            $query->bindParam(':telefon', $this->telefon);
            $query->bindParam(':email', $this->email);
            $query->bindParam(':datum_od', $this->datumPolazak);
            $query->bindParam(':datum_do', $this->datumPovratak);
            $query->bindParam(':vrsta_osiguranja', $this->vrstaOsiguranja);

            $query->execute();

            $this->lastId = $this->db->lastInsertId();
            if($this->vrstaOsiguranja == 2){
                $this->grupnoOsiguranje();
            }



        }



        private function grupnoOsiguranje(){
            $sql = "INSERT INTO grupno_osiguranje(korisnik_id, ime_prezime_osiguranik, datum_rodjenja_osiguranik, broj_pasosa_osiguranik) VALUES (:korisnik_id, :ime_prezime_osiguranik, :datum_rodjenja_osiguranik, :broj_pasosa_osiguranik)";
            
            $query = $this->db->prepare($sql);
           

            $osiguranje = array();

            foreach(static::$db_table_fields_osiguranje as $db_field){

                    $osiguranje[$db_field] = $this->$db_field;

            }

            $prviClan = key($osiguranje);

            for($i=0; $i < count($osiguranje[$prviClan]); $i++){
                $query->bindParam(':korisnik_id', $this->lastId);
                $query->bindParam(':ime_prezime_osiguranik', $osiguranje['ime_prezime_osiguranik'][$i]);
                $query->bindParam(':datum_rodjenja_osiguranik', $osiguranje['datum_rodjenja_osiguranik'][$i]);
                $query->bindParam(':broj_pasosa_osiguranik', $osiguranje['broj_pasosa_osiguranik'][$i]);

                $query->execute();

            }


        }



        public function dohvatiSveKorisnike(){

            $sql = "SELECT * FROM korisnik_osiguranja";
            $query=$this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        }


        public function dohvatiGrupnoOsiguranje($id){
            $sql = "SELECT * FROM korisnik_osiguranja k 
                    LEFT JOIN grupno_osiguranje g ON k.id = g.korisnik_id 
                    WHERE k.id = $id ";
            $query=$this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }


        public function napraviPDF($id){
            $sql = "SELECT * FROM korisnik_osiguranja
                    WHERE id = $id ";

            $query=$this->db->prepare($sql);
            $query->execute();
            return $query->fetch(); 

        }
        


       
    }


?>
