<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Prodajalec detail</title>

<h1>Details of: <?= $prodajalci["ime"] ?></h1>

<p>[
<a href="<?= BASE_URL . "shoe" ?>">All shoes</a> |
<a href="<?= BASE_URL . "shoe/add" ?>">Add new</a> |
<a href="<?= BASE_URL . "store" ?>">Shoestore</a> |
<?php if(!isset($_SESSION["ime"])) { ?>
    <a href="<?= BASE_URL . "prijava" ?>">Prijava</a> | |
    <?php } else {?>
    <a href="<?= BASE_URL . "odjava" ?>">Odjava</a> ||
    <?php } ?>
<a href="<?= BASE_URL . "registracija" ?>">Registracija</a> |
<?php if(isset($_SESSION["vloga"])) { ?>
    <a href="<?= BASE_URL . "mojProfil" ?>">Moj Profil</a>  |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "administrator" ) { ?>
    <a href="<?= BASE_URL . "prodajalci" ?>">Prodajalci</a>  |
<?php } ?>
]</p>

<ul>
    <li>Ime: <b><?= $prodajalci["ime"] ?></b></li>
    <li>Priimek: <b><?= $prodajalci["priimek"] ?></b></li>
    <li>Email: <b><?= $prodajalci["email"] ?></b></li>
</ul>

<p>[ <a href="<?= BASE_URL . "prodajalci/edit?id=" . $_GET["id"] ?>">Edit</a> |
<a href="<?= BASE_URL . "shoe" ?>">Shoe index</a> ]</p>
