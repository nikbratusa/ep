<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Uredi stranko</title>

<h1>Uredi stranko</h1>

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

<form action="<?= BASE_URL . "stranke/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $stranka["id"] ?>"  />
    <p><label>Ime: <input type="text" name="ime" value="<?= $stranka["ime"] ?>" autofocus required/></label></p>
    <p><label>Priimek: <input type="text" name="priimek" value="<?= $stranka["priimek"] ?>" required/></label></p>
    <p><label>Email: <input type="email" name="email" value="<?= $stranka["email"] ?>" required/></label></p>
    <p><label>Naslov: <input type="text" name="naslov" value="<?= $stranka["naslov"] ?>" required/></label></p>
    <p><label>Telefon: <input type="text" name="telefon" value="<?= $stranka["telefon"] ?>" required/></label></p>
    <p><label>Geslo: <input type="password" name="geslo" value="<?= $stranka["geslo"] ?>" required/></label></p>
    <input type="radio" name="status" value="aktiviran" class="radio" <?php if (isset($stranka["status"]) && $stranka["status"] == 'aktiviran'): ?>checked='checked'<?php endif; ?> /> Aktiviran
    <input type="radio" name="status" value="neaktiviran" class="radio" <?php if (isset($stranka["status"]) && $stranka['status'] == 'neaktiviran'): ?>checked='checked'<?php endif; ?> /> Neaktiviran
    <p><button>Uredi</button></p>
</form>

<form action="<?= BASE_URL . "stranke/delete" ?>" method="post">
    <input type="hidden" name="id" value="<?= $stranka["id"] ?>"  />
    <label>Izbriši? <input type="checkbox" name="delete_confirmation" /></label>
    <button type="submit" class="important">Izbriši</button>
</form>

