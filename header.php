<?php

    require_once("database.php");
    require_once("korisnik.php");




?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>IM clinic patients</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/1f59a29ea5.js"></script>


        <style>
            .bojaNav{
                background-color:#9d7ff9;
            }
            .nav-item{
                color:white;
            }
  
            #mainNav{
                background-color: #9d7ff9;
            }
           

        </style>
        
    </head>

<body>


    <nav class="navbar navbar-expand-sm bojaNav">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav" style="color:white">
                &#9776;
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.php">Forma za unos novog osiguranje</a>
                    <a class="nav-item nav-link" href="pregledpolisa.php">Pregled unetih podataka</a>

                </div>
            </div>
        </div>                           
    </nav>



<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>