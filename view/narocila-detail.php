<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Podrobnosti naročila</title>

<h1>Podrobnosti naročila: <?= $narocila["id"] ?></h1>

<p>[
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "administrator" ) { ?>
    <a href="<?= BASE_URL . "shoe" ?>">Seznam čevljev</a> |
    <a href="<?= BASE_URL . "prodajalci" ?>">Prodajalci</a>  |
    <a href="<?= BASE_URL . "mojProfil" ?>">Moj Profil</a>  |
    <?php if(!isset($_SESSION["ime"])) { ?>
    <a href="<?= BASE_URL . "prijava" ?>">Prijava</a>
    <?php } else {?>
    <a href="<?= BASE_URL . "odjava" ?>">Odjava</a>
    <?php } ?>
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "prodajalec" ) { ?>
    <a href="<?= BASE_URL . "shoe" ?>">Seznam čevljev</a> |
    <a href="<?= BASE_URL . "shoe/add" ?>">Dodaj čevlje</a>  |
    <a href="<?= BASE_URL . "store/narocila" ?>">Vsa narocila</a> |
    <a href="<?= BASE_URL . "stranke" ?>">Stranke</a>  |
    <a href="<?= BASE_URL . "mojProfil" ?>">Moj Profil</a>  |
    <?php if(!isset($_SESSION["ime"])) { ?>
    <a href="<?= BASE_URL . "prijava" ?>">Prijava</a>
    <?php } else {?>
    <a href="<?= BASE_URL . "odjava" ?>">Odjava</a>
    <?php } ?>
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka" ) { ?>
    <a href="<?= BASE_URL . "store" ?>">Seznam čevljev</a> |
    <a href="<?= BASE_URL . "store/narocilaPregled" ?>">Moja naročila</a> |
    <a href="<?= BASE_URL . "mojProfil" ?>">Moj Profil</a>  |
    <?php if(!isset($_SESSION["ime"])) { ?>
    <a href="<?= BASE_URL . "prijava" ?>">Prijava</a>
    <?php } else {?>
    <a href="<?= BASE_URL . "odjava" ?>">Odjava</a>
    <?php } ?>
<?php } ?>
<?php if(!isset($_SESSION["vloga"])) { ?>
    <a href="<?= BASE_URL . "shoe" ?>">Seznam čevljev</a> |
    <a href="<?= BASE_URL . "prijava" ?>">Prijava</a> |
    <a href="<?= BASE_URL . "registracija" ?>">Registracija</a>
<?php } ?>
]</p>

<p>Številka naročila: <?= $narocila["id"] ?>, Vsota: <?= $narocila["vsota"] ?>EUR, Email: <?= $narocila["email"]?>, Status: <?= $narocila["status"] ?></p>
<?php $number = COUNT($shoes);
    if($number > 0)  {  
        for($i=0; $i<$number; $i++){ ?>
        <ul>
            <li>Brand: <b><?= htmlspecialchars($shoes[$i]["brand"]) ?></b></li>
            <li>Name: <b><?= htmlspecialchars($shoes[$i]["name"]) ?></b></li>
            <li>Price: <b><?= htmlspecialchars($shoes[$i]["price"]) ?> EUR</b></li>
            <li>Size: <b><?= htmlspecialchars($shoes[$i]["size"]) ?></b></li>
            <li>Quantity: <b><?= $izdelki[$i]["kolicina"]?></b></li>
        </ul>
        <?php } ?>
    <?php } ?>
<button><a href="<?= BASE_URL . "store/narocila/edit?id=" . $_GET["id"] ?>">Uredi</a></button>
<button><a href="<?= BASE_URL . "store/narocila" ?>">Nazaj na vsa naročila</a></button>
