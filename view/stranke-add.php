<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Dodaj stranko</title>

<h1>Dodaj stranko</h1>

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

<form action="<?= BASE_URL . "stranke/add" ?>" method="post">
    <p><label>Ime: <input type="text" name="ime" pattern="[A-Za-zčćžš]+" oninput="setCustomValidity('')" value="<?= $ime ?>" autofocus required/></label></p>
    <p><label>Priimek: <input type="text" name="priimek" pattern="[A-Za-zčćžš]+" oninput="setCustomValidity('')" value="<?= $priimek ?>" required/></label></p>
    <p><label>Email: <input type="email" name="email" value="<?= $email ?>" required/></label></p>
    <p><label>Naslov: <input type="text" name="naslov" oninput="setCustomValidity('')" pattern="[A-Za-z0-9čćžš\s]+" value="<?= $naslov ?>" required/></label></p>
    <p><label>Telefon: <input type="text" name="telefon" oninput="setCustomValidity('')" pattern="[0-9]{9}" value="<?= $telefon ?>"required /></label></p>
    <p><label>Geslo: <input type="password" name="geslo" value="<?= $geslo ?>"required /></label></p>
    <p><button>Dodaj</button></p>
</form>

<script type="text/javascript">
    var ime = document.getElementsByName('ime')[0];
    var priimek = document.getElementsByName('priimek')[0];
    var naslov = document.getElementsByName('naslov')[0];
    var telefon = document.getElementsByName('telefon')[0];
    
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