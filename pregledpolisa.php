<?php

include_once('header.php');

$korisnik = new Korisnik($database);
$polise = $korisnik->dohvatiSveKorisnike();



?>


    <div class="container">
    <br>
            <div class="col-md-12">
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <td>Datum Unosa Polise</td>
                            <td>Ime i Prezime Nosioca</td>
                            <td>Datum Rodjenja</td>
                            <td>Broj Pasosa</td>
                            <td>Email</td>
                            <td>Datum putovanja</td>
                            <td>Broj Dana</td>
                            <td>Osiguranje</td>
                            <td>Akcije</td>
                            <td>PDF</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($polise as $polisa){ 
                            $prviDatum = strtotime($polisa['datum_od']);
                            $drugiDatum = strtotime($polisa['datum_do']);
                            $razlika = $drugiDatum - $prviDatum;
                            $razlika = round($razlika / (60 * 60 * 24));


                            if($polisa['vrsta_osiguranja'] == 1){
                                $vrstaOsiguranja = 'Individualno';
                            }else if($polisa['vrsta_osiguranja'] == 2){
                                $vrstaOsiguranja = 'Grupno';
                            }
                    ?>
                        <tr>
                            <td><?php echo $polisa['datum_unosa'];  ?></td>
                            <td><?php echo $polisa['ime_prezime'];  ?></td>
                            <td><?php echo $polisa['datum_rodjenja'];  ?></td>
                            <td><?php echo $polisa['broj_pasosa'];  ?></td>
                            <td><?php echo $polisa['email'];  ?></td>
                            <td><?php echo $polisa['datum_od']." - ".$polisa['datum_do'];  ?></td>
                            <td><?php echo $razlika ?></td>
                            <td><?php echo $vrstaOsiguranja;  ?></td>

                            <?php  if($polisa['vrsta_osiguranja'] == 1){ ?>

                                <td><?php echo "Induvidualno osiguranje";  ?></td>

                            <?php  }else if($polisa['vrsta_osiguranja'] == 2){ ?>

                                <td><?php echo "<a href='grupno_osiguranje.php?id=".$polisa['id']."'>Pregled grupno osiguranja</a>";  ?></td>

                            <?php  } ?>
                            <td><?php echo "<a href='pdf.php?id=".$polisa['id']."'>PDF</a>";  ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>






<?php

    include_once('footer.php');

?>