<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Narocilo detail</title>

<h1>Details of Narocilo <?= $narocila["id"] ?></h1>

<p>[
<a href="<?= BASE_URL . "shoe" ?>">All shoes</a> |
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "prodajalec" ) { ?>
    <a href="<?= BASE_URL . "shoe/add" ?>">Add new</a>  |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka") { ?>
    <a href="<?= BASE_URL . "store" ?>">Buy shoes</a> |
<?php } ?>
<?php if(!isset($_SESSION["ime"])) { ?>
    <a href="<?= BASE_URL . "prijava" ?>">Prijava</a> | |
    <?php } else {?>
    <a href="<?= BASE_URL . "odjava" ?>">Odjava</a> ||
    <?php } ?>
<?php if(!isset($_SESSION["vloga"])) { ?>
    <a href="<?= BASE_URL . "registracija" ?>">Registracija</a> |
<?php } ?>
<?php if(isset($_SESSION["vloga"])) { ?>
    <a href="<?= BASE_URL . "mojProfil" ?>">Moj Profil</a>  |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "administrator" ) { ?>
    <a href="<?= BASE_URL . "prodajalci" ?>">Prodajalci</a>  |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "prodajalec" ) { ?>
    <a href="<?= BASE_URL . "stranke" ?>">Stranke</a> |
    <a href="<?= BASE_URL . "store/narocila" ?>">Vsa narocila</a> |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka" ) { ?>
    <a href="<?= BASE_URL . "store/narocilaPregled" ?>">Moja narocila</a>  |
<?php } ?>
]</p>

<p>Številka naročila: <?= $narocila["id"] ?>, Vsota: <?= $narocila["vsota"] ?>EUR, Email: <?= $narocila["email"]?>, Status: <?= $narocila["status"] ?></p>
<?php $number = COUNT($shoes);
    if($number > 0)  {  
        for($i=0; $i<$number; $i++){ ?>
        <ul>
            <li>Brand: <b><?= $shoes[$i]["brand"] ?></b></li>
            <li>Name: <b><?= $shoes[$i]["name"] ?></b></li>
            <li>Price: <b><?= $shoes[$i]["price"] ?> EUR</b></li>
            <li>Size: <b><?= $shoes[$i]["size"] ?></b></li>
            <li>Quantity: <b><?= $izdelki[$i]["kolicina"]?></b></li>
        </ul>
        <?php } ?>
    <?php } ?>
<p>[ <a href="<?= BASE_URL . "store/narocila/edit?id=" . $_GET["id"] ?>">Edit</a> |
<a href="<?= BASE_URL . "store/narocila" ?>">Vsa narocila</a> ]</p>
