<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Registracija</title>

<h1>Registracija</h1>

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
]</p>

<div id="main">
   <form action="<?= BASE_URL . "registracijaUstvari" ?>" method="post">
        <p><label>Ime: <input type="text" name="imeForm" required/></label></p>
        <p><label>Priimek: <input type="text" name="priimekForm" required/></label></p>
        <p><label>Email: <input type="email" name="emailForm" required/></label></p>
        <p><label>Geslo: <input type="password" name="gesloForm" required/></label></p>

        <p><input type="submit" value="Registracija"></p>
    </form>
    <p>Že imaš račun? <a href="<?= BASE_URL . "prijava" ?>">Prijavi se.</a>.</p>

</div>
