<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Moja Narocila</title>

<h1>Moja Narocila</h1>

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
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka" ) { ?>
    <a href="<?= BASE_URL . "store/narocilaPregled" ?>">Moja narocila</a>  |
<?php } ?>
]</p>

<ul>
    
    <?php foreach ($narocila as $n): ?>
        <li>Številka naročila: <?= $n["id"] ?> Vsota: <?= $n["vsota"] ?> Status: <?= $n["status"] ?></li>
    <?php endforeach; ?>
    
</ul>

