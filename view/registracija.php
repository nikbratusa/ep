<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<meta charset="UTF-8" />
<title>Registracija</title>

<h1>Registracija</h1>

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

<div id="main">
   <form action="<?= BASE_URL . "registracijaUstvari" ?>" method="post">
        <p><label>Prodajalec: <input type="radio" id="prod" name="vlogaForm" value="prodajalec" onclick="hide();" checked='checked'/> </label><p>
        <p><label>Stranka: <input type="radio" id="stranka" name="vlogaForm" value="stranka" onclick="show();"/> </label><p>
        <p><label>Ime: <input type="text" name="imeForm" required/></label></p>
        <p><label>Priimek: <input type="text" name="priimekForm" required/></label></p>
        <p><label>Email: <input type="email" name="emailForm" required/></label></p>
        <div id="div1" class="hide">
            <p><label>Naslov: <input type="text" id="naslov" name="naslovForm" /></label></p>
            <p><label>Telefon: <input type="text" id="telefon" name="telefonForm" /></label></p>
        </div>
        <p><label>Geslo: <input type="password" name="gesloForm" required/></label></p>
        <p><input type="submit" value="Registracija"></p>
    </form>
    <p>Že imaš račun? <a href="<?= BASE_URL . "prijava" ?>">Prijavi se.</a>.</p>

</div>

<script type="text/javascript">
    function hide(){
        document.getElementById('div1').style.display ='none';
    }
    function show(){
        document.getElementById('div1').style.display = 'block';
    }
    $("#prod").click(function() {
            $("#naslov").prop("required", false);
            $("#telefon").prop("required", false);
    });
    $("#stranka").click(function() {
            $("#naslov").prop("required", true);
            $("#telefon").prop("required", true);
    });
</script>
