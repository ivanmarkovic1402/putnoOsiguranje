<?php  

    include_once('header.php');



    if(empty($_GET['id'])){
        header("Location: index.php");
    }else{
        $korisnik = new Korisnik($database);
        $grupnoOsiguranje = $korisnik->dohvatiGrupnoOsiguranje($_GET['id']);
    }
?>



<div class="container">

    <div class="col-md-12">
        <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <td>Datum Unosa Polise</td>
                    <td>Ime i Prezime Nosioca</td>
                    <td>Ime i Prezime Osiguranika</td>
                    <td>Datum rodjenja Osiguranika</td>
                    <td>Broj Pasosa Osiguranika</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($grupnoOsiguranje as $osiguranik){ ?>
                <tr>
                    <td><?php echo $osiguranik['datum_unosa']; ?></td>
                    <td><?php echo $osiguranik['ime_prezime']; ?></td>
                    <td><?php echo $osiguranik['ime_prezime_osiguranik']; ?></td>
                    <td><?php echo $osiguranik['datum_rodjenja_osiguranik']; ?></td>
                    <td><?php echo $osiguranik['broj_pasosa_osiguranik']; ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>




<?php

    include_once('footer.php');

?>