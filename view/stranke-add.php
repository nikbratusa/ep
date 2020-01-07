<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Add stranka</title>

<h1>Add stranka</h1>

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
    <a href="<?= BASE_URL . "stranke" ?>">Stranke</a>
    <a href="<?= BASE_URL . "store/narocila" ?>">Vsa narocila</a> |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka" ) { ?>
    <a href="<?= BASE_URL . "store/narocilaPregled" ?>">Moja narocila</a>  |
<?php } ?>
]</p>

<form action="<?= BASE_URL . "stranke/add" ?>" method="post">
    <p><label>Ime: <input type="text" name="ime" value="<?= $ime ?>" autofocus /></label></p>
    <p><label>Priimek: <input type="text" name="priimek" value="<?= $priimek ?>" /></label></p>
    <p><label>Email: <input type="email" name="email" value="<?= $email ?>" /></label></p>
    <p><label>Naslov: <input type="text" name="naslov" value="<?= $naslov ?>" /></label></p>
    <p><label>Telefon: <input type="text" name="telefon" value="<?= $telefon ?>" /></label></p>
    <p><label>Geslo: <input type="password" name="geslo" value="<?= $geslo ?>" /></label></p>
    <p><button>Dodaj</button></p>
</form>