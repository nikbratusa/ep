<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Dodaj čevlje</title>

<h1>Dodaj čevlje</h1>

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

<form action="<?= BASE_URL . "shoe/add" ?>" method="post">
    <p><label>Znamka: <input type="text" name="brand" value="<?= $brand ?>" required autofocus /></label></p>
    <p><label>Ime: <input type="text" name="name" value="<?= $name ?>" required /></label></p>
    <p><label>Cena: <input type="number" name="price" value="<?= $price ?>" required /></label></p>
    <p><label>Velikost: <input type="number" name="size" value="<?= $size ?>" required /></label></p>
    <p><button>Dodaj</button></p>
</form>
