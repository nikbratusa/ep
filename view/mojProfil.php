<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Moj profil</title>

<h1>Moj profil</h1>

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
   <form action="<?= BASE_URL . "posodobi" ?>" method="post">
        <p><label>Ime: <input type="text" name="imeForm" pattern="[A-Za-zčćžš]+" oninput="setCustomValidity('')"  value="<?php if(isset($_SESSION["ime"])){print $_SESSION["ime"];} ?>"required/></label></p>
        <p><label>Priimek: <input type="text" name="priimekForm" oninput="setCustomValidity('')" pattern="[A-Za-zčćžš]+" value="<?php if(isset($_SESSION["priimek"])){print $_SESSION["priimek"];} ?>" required/></label></p>
        <p><label>Email: <input type="email" name="emailForm" value="<?php if(isset($_SESSION["email"])){print $_SESSION["email"];} ?>"required/></label></p>
        <?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka" ) { ?>
        <p><label>Naslov: <input type="text" name="naslovForm" oninput="setCustomValidity('')" pattern="[A-Za-z0-9čćžš\s]+" value="<?php if(isset($_SESSION["naslov"])){print $_SESSION["naslov"];} ?>"required/></label></p>
        <p><label>Telefon: <input type="text" name="telefonForm" oninput="setCustomValidity('')" pattern="[0-9]{9}" value="<?php if(isset($_SESSION["telefon"])){print $_SESSION["telefon"];} ?>"required/></label></p>
        <?php } ?>
        <p><label>Geslo: <input type="password" name="gesloForm" required/></label></p>
        <input type="hidden" type="text" name="idForm" value="<?php if(isset($_SESSION["id"])){print $_SESSION["id"];} ?>"required/>
        <input type="hidden" type="text" name="vlogaForm" value="<?php if(isset($_SESSION["vloga"])){print $_SESSION["vloga"];} ?>"required/>
        <p><input type="submit" value="Posodobi"></p>
    </form>

</div>

<script type="text/javascript">
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
