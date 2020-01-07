<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Shoe detail</title>

<h1>Details of: <?= $shoe["name"] ?></h1>

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

<ul>
    <li>Brand: <b><?= $shoe["brand"] ?></b></li>
    <li>Name: <b><?= $shoe["name"] ?></b></li>
    <li>Price: <b><?= $shoe["price"] ?> EUR</b></li>
    <li>Size: <b><?= $shoe["size"] ?></b></li>
</ul>

<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "prodajalec" ) { ?>
    <p>[ <a href="<?= BASE_URL . "shoe/edit?id=" . $_GET["id"] ?>">Edit</a> |
<?php } ?>
<a href="<?= BASE_URL . "shoe" ?>">Back to all shoes</a> ]</p>
