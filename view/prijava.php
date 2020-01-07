<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Prijava</title>

<h1>Prijava</h1>

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
   <form action="<?= BASE_URL . "prijavaPreveri" ?>" method="post">
        <p><label>Email: <input type="email" name="emailForm" required/></label></p>
        <p><label>Geslo: <input type="password" name="gesloForm" required/></label></p>

        <p><input type="submit" value="Prijava"></p>
    </form>
    <p>Še nimaš računa? <a href="<?= BASE_URL . "registracija" ?>">Registrijaj se.</a>.</p>

</div>

