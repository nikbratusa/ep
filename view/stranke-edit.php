<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Edit Stranka</title>

<h1>Edit stranka</h1>

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

<form action="<?= BASE_URL . "stranke/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $stranka["id"] ?>"  />
    <p><label>Ime: <input type="text" name="ime" value="<?= $stranka["ime"] ?>" autofocus /></label></p>
    <p><label>Priimek: <input type="text" name="priimek" value="<?= $stranka["priimek"] ?>" /></label></p>
    <p><label>Email: <input type="email" name="email" value="<?= $stranka["email"] ?>" /></label></p>
    <p><label>Naslov: <input type="text" name="naslov" value="<?= $stranka["naslov"] ?>" /></label></p>
    <p><label>Telefon: <input type="text" name="telefon" value="<?= $stranka["telefon"] ?>" /></label></p>
    <p><label>Geslo: <input type="password" name="geslo" value="<?= $stranka["geslo"] ?>" /></label></p>
    <p><label>Status: <input type="text" name="status" value="<?= $stranka["status"] ?>" /></label></p>
    <p><button>Edit stranka</button></p>
</form>

<form action="<?= BASE_URL . "stranke/delete" ?>" method="post">
    <input type="hidden" name="id" value="<?= $stranka["id"] ?>"  />
    <label>Delete? <input type="checkbox" name="delete_confirmation" /></label>
    <button type="submit" class="important">Delete stranka</button>
</form>

