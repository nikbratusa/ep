<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<meta charset="UTF-8" />
<title>Registracija</title>

<h1>Registracija</h1>

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

<div id="main">
   <form action="<?= BASE_URL . "registracijaUstvari" ?>" method="post">
        <p><label>Prodajalec: <input type="radio" id="prod" name="vlogaForm" value="prodajalec" onclick="hide();" checked='checked'/> </label><p>
        <p><label>Stranka: <input type="radio" id="stranka" name="vlogaForm" value="stranka" onclick="show();"/> </label><p>
        <p><label>Ime: <input type="text" name="imeForm" pattern="[A-Za-zčćžš]+" oninput="setCustomValidity('')" required/></label></p>
        <p><label>Priimek: <input type="text" name="priimekForm" pattern="[A-Za-zčćžš]+" oninput="setCustomValidity('')" required/></label></p>
        <p><label>Email: <input type="email" name="emailForm" required/></label></p>
        <div id="div1" class="hide">
            <p><label>Naslov: <input type="text" id="naslov" oninput="setCustomValidity('')" pattern="[A-Za-z0-9čćžš\s]+" name="naslovForm" /></label></p> 
            <p><label>Telefon: <input type="text" id="telefon" name="telefonForm" oninput="setCustomValidity('')" pattern="[0-9]{9}" /></label></p>
        </div>
        <p><label>Geslo: <input type="password" name="gesloForm" required/></label></p>
        <p><input type="submit" value="Registracija"></p>
    </form>
    <p>Že imaš račun? <a href="<?= BASE_URL . "prijava" ?>">Prijavi se.</a></p>

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
    
    var ime = document.getElementsByName('imeForm')[0];
    var priimek = document.getElementsByName('priimekForm')[0];
    var naslov = document.getElementsByName('naslovForm')[0];
    var telefon = document.getElementsByName('telefonForm')[0];
    
    ime.oninvalid = function(event) {
        event.target.setCustomValidity('Ime lahko vsebuje samo male/velike črke!');
    }
    priimek.oninvalid = function(event) {
        event.target.setCustomValidity('Priimek lahko vsebuje samo male/velike črke!');
    }
    naslov.oninvalid = function(event) {
        event.target.setCustomValidity('Naslov lahko vsebuje samo male/velike črke,številke in presledke!');
    }
    telefon.oninvalid = function(event) {
        event.target.setCustomValidity('Telefon mora biti oblike 111222333');
    }
</script>
