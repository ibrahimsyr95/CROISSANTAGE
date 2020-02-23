<html>

<head>
    <meta charset="utf-8">
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./application/assets/css/style.css">
        <link rel="stylesheet" href="./application/assets/css/style_v2.css">
    </head>
    <body>
    <header>
        <?php
        if(isset($_SESSION["id"])){
          
        ?>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse  navbar-collapse" id="collapsibleNavbar">
            <a class="nav-link active" href="./">Croissantage</a>
            <a class="nav-link" href="./myprofile">My profile</a>
            <a class="nav-link" href="./stat">Stat</a>
            <?php
        if(isset($_SESSION["role"])&&$_SESSION["role"]=='Admin'){
          
        ?>
            <a class="nav-link" href="./etudiants">Students</a>
            <a class="nav-link" href="./viennoiserie">Croissant</a>
            <a class="nav-link" href="./ctg_pending">Croissant pedning</a>
            <?php
        }
          ?>
            <a class="nav-link" href="./deconnecter">Log out</a>
          </div>
        </nav>
          <?php
        }
     
          ?>
    </header>
    <input type="hidden" id="csrf_token" value="<?php if(isset($_SESSION['csrf_token']))echo $_SESSION["csrf_token"]; ?>">