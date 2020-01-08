<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Vsa Narocila</title>

<h1>Vsa Narocila</h1>

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

<h2>Čakajoča</h2>
<ul>
    <?php foreach ($cakajoca as $c): ?>
        <li><a href="<?= BASE_URL . "store/narocila?id=" . $c["id"] ?>">
                Številka naročila: <?= $c["id"] ?>, Vsota: <?= $c["vsota"] ?>EUR, Email: <?= $c["email"]?>, Status: <?= $c["status"] ?></a></li>
    <?php endforeach; ?>   
</ul>

<h2>Potrjena</h2>
<ul>
    <?php foreach ($potrjena as $p): ?>
        <li><a href="<?= BASE_URL . "store/narocila?id=" . $p["id"] ?>">
            Številka naročila: <?= $p["id"] ?>, Vsota: <?= $p["vsota"] ?>EUR, Email: <?= $p["email"]?>, Status: <?= $p["status"] ?></a></li>
    <?php endforeach; ?>   
</ul>

<h2>Preklicana</h2>
<ul>
    <?php foreach ($preklicana as $pr): ?>
        <li><a href="<?= BASE_URL . "store/narocila?id=" . $pr["id"] ?>">
            Številka naročila: <?= $pr["id"] ?>, Vsota: <?= $pr["vsota"] ?>EUR, Email: <?= $pr["email"]?>, Status: <?= $pr["status"] ?></a></li>
    <?php endforeach; ?>   
</ul>

<h2>Stornirana</h2>
<ul>
    <?php foreach ($stornirana as $s): ?>
        <li><a href="<?= BASE_URL . "store/narocila?id=" . $s["id"] ?>">
            Številka naročila: <?= $s["id"] ?>, Vsota: <?= $s["vsota"] ?>EUR, Email: <?= $s["email"]?>, Status: <?= $s["status"] ?></a></li>
    <?php endforeach; ?>   
</ul>