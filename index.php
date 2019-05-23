<?php

    include_once('header.php');


    $korisnik = new Korisnik($database);

    if(isset($_POST['submitDugme'])){
        $korisnik->ime_prezime = trim($_POST['ime_prezime']);
        $korisnik->datumRodjenja = trim($_POST['datumRodjenja']);
        $korisnik->brPasosa = trim($_POST['brPasosa']);
        $korisnik->telefon = trim($_POST['telefon']);
        $korisnik->email = trim($_POST['email']);
        $korisnik->datumPolazak = trim($_POST['datumPolazak']);
        $korisnik->datumPovratak = trim($_POST['datumPovratak']);
        $korisnik->vrstaOsiguranja = trim($_POST['vrstaOsiguranja']);

        $korisnik->ime_prezime_osiguranik = $_POST['ime_prezimeOsiguranik'];
        $korisnik->datum_rodjenja_osiguranik = $_POST['datumRodjenjaOsiguranika'];
        $korisnik->broj_pasosa_osiguranik = $_POST['brPasosaOsiguranik'];

    
        $korisnik->kreirajKorisnika();
    }


?>



<div class="container">
<br>
<div class="offset-md-3 col-md-6">
    <form action="#" method='post'>

        <div class="form-group">
        <label for="ime_prezime">Ime i Prezime</label>
            <input type="text" name='ime_prezime' class='form-control' placeholder='Unesite Ime i Prezime' required>
        </div>
        <div class="form-group">
        <label for="datumRodjenja">Datum rodjenja</label>
            <input type="date" name='datumRodjenja' class='form-control' required>
        </div>
        <div class="form-group">
        <label for="brPasosa">Broj Pasosa</label>
            <input type="text" name='brPasosa' class='form-control' placeholder='Broj Pasosa' required>
        </div>
        <div class="form-group">
        <label for="telefon">Broj Telefona</label>
            <input type="text" name='telefon' class='form-control' placeholder='Broj telefona'>
        </div>
        <div class="form-group">
        <label for="email">Email adresa</label>
            <input type="email" name='email' class='form-control' placeholder='Email adresa' required>
        </div>
        <div class="form-group">
        <label for="datumPolazak">Datum polaska</label>
            <input type="date" name='datumPolazak' id='datumPolazak' onchange='razlika()' class='form-control' required>
        </div>
        <div class="form-group">
        <label for="datumPovratak">Datum povratka</label>
            <input type="date" name='datumPovratak' id='datumPovratak' onchange='razlika()' class='form-control' required>
        </div>
        <div id='razlikaDatuma'>
        </div>

        <div class="form-group">
            <label for="vrstaOsiguranja">Putno osiguranje</label><br>
            <label><input type="radio"  name="vrstaOsiguranja" id ='hide' value="1" checked>Individualno</label><br>
            <label><input type="radio" name="vrstaOsiguranja" id ='show' value="2">Grupno</label><br>
        </div> 


        <div class='dodajKorisnika'>
       
         <a href='#' class='btn btn-primary' onclick='kloniraj()' >Dodaj Osiguranika</a>
         <br>


            <div id='dodajOsiguranika'>
            <br>Osiguranik: <br>
                <div class="form-group">
                    <input type="text" name='ime_prezimeOsiguranik[]' class='form-control dodatak' placeholder='Unesite ime i prezime osiguranika'>
                </div>
                <div class="form-group">
                    <input type="date" name='datumRodjenjaOsiguranika[]' class='form-control dodatak' placeholder='Unesite datum rodjenja osiguranika'>
                </div>
                <div class="form-group">
                    <input type="text" name='brPasosaOsiguranik[]' class='form-control dodatak' placeholder='Unesite broj pasosa osiguranika'>
                </div>
            </div>

            <br><br>

        </div>


        <input type='submit' value='Submit' name='submitDugme' class='btn btn-success' >

    </form>
    </div>
</div>






<script>





    function razlika(){

        var datumPolazak = document.getElementById('datumPolazak').value;
        var datumPovratak = document.getElementById('datumPovratak').value;

        if(datumPolazak && datumPovratak){


        var datum_od = new Date(datumPolazak);
        var datum_do = new Date(datumPovratak);
        var razlikaDana = parseInt((datum_do - datum_od) / (1000 * 60 * 60 * 24)); 

        if(razlikaDana >= 0){
            var element = document.getElementById("razlikaDatuma");
            element.innerHTML =" Ukupno dana " + razlikaDana + "<br><br>"; 

        }else{
            var element = document.getElementById("razlikaDatuma");
            element.innerHTML =" Datum polaska mora biti pre datuma povratka <br><br>";  
        }

        }else{
        var element = document.getElementById("razlikaDatuma");
        element.innerHTML =" Molim Vas da izaberete i datum polaska i datum povratka <br><br>";
        }
    }






        var counter = 0;
        var original = document.getElementById('dodajOsiguranika');

        function kloniraj() {
        var clone = original.cloneNode(true);
        counter++;
        clone.id = "dodajOsiguranika" + counter;
        original.parentNode.appendChild(clone);

        }



        $(document).ready(function() {
                $(".dodajKorisnika").hide();
        });

        $(document).ready(function(){
            
            $("#hide").click(function(){
                $(".dodajKorisnika").hide();
            });
            $("#show").click(function(){
                $(".dodajKorisnika").show();
            });
        
        }); 



</script>







<?php

    include_once('footer.php');

?>