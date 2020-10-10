<?php
require_once 'Include/database.php';
require_once 'Include/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Stocks</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="Css/Master.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Js/Main.js"></script>
</head>
<body>

<div id="NavBar">
    <img src="Ressources/Logo.png" alt="">
    <div>
        <a id="view" class="fas fa-eye" href="?page=Visualiser"> Visualiser</a>
        <a id="add" class="fas fa-plus" href="?page=Ajouter"> Ajouter</a>
        <a id="find" class="fas fa-search" href="?page=Recherche"> Recherche</a>
    </div>
</div>

<div class="NavTop">
    <div class="header">
        <h1>Gestion Des Stocks</h1>
        <div>
            <h4 class="breadcrum"></h4>
        </div>
    </div>
    <div id="main">
        <?php
        $path = 'PHP/';
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            if (file_exists($path . $_GET['page'] . '.php'))
                include($path . $_GET['page'] . '.php');
            else include($path . 'Visualiser.php');
        } else include($path . 'Visualiser.php');
        ?>
    </div>
</div>

</body>
</html>