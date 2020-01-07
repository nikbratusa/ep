<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Add entry</title>

<h1>Add new shoes</h1>

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

<form action="<?= BASE_URL . "shoe/add" ?>" method="post">
    <p><label>Brand: <input type="text" name="brand" value="<?= $brand ?>" autofocus /></label></p>
    <p><label>Name: <input type="text" name="name" value="<?= $name ?>" /></label></p>
    <p><label>Price: <input type="number" name="price" value="<?= $price ?>" /></label></p>
    <p><label>Size: <input type="number" name="size" value="<?= $size ?>" /></label></p>
    <p><button>Insert</button></p>
</form>
