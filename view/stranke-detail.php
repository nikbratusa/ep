<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Podrobnosti stranke</title>

<h1>Podrobnosti stranke: <?= $stranke["ime"] ?></h1>

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

<ul>
    <li>Ime: <b><?= $stranke["ime"] ?></b></li>
    <li>Priimek: <b><?= $stranke["priimek"] ?></b></li>
    <li>Email: <b><?= $stranke["email"] ?></b></li>
    <li>Naslov: <b><?= $stranke["naslov"] ?></b></li>
    <li>Telefon: <b><?= $stranke["telefon"] ?></b></li>
</ul>

<button><a href="<?= BASE_URL . "stranke/edit?id=" . $_GET["id"] ?>">Uredi</a></button>
<button><a href="<?= BASE_URL . "stranke" ?>">Nazaj na vse stranke</a></button>
