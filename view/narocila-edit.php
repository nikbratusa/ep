<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Uredi naročilo</title>

<h1>Uredi naročilo</h1>

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

<p>Številka naročila: <?= $narocilo["id"] ?>
<form action="<?= BASE_URL . "store/narocila/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $narocilo["id"] ?>"/>
    <input type="hidden" name="email" value="<?= $narocilo["email"] ?>"/>
    <input type="hidden" name="vsota" value="<?= $narocilo["vsota"] ?>"/>
    <input type="radio" name="status" value="caka" class="radio" <?php if (isset($narocilo["status"]) && $narocilo["status"] == 'caka'): ?>checked='checked'<?php endif; ?> /> Caka
    <input type="radio" name="status" value="potrjeno" class="radio" <?php if (isset($narocilo["status"]) && $narocilo['status'] == 'potrjeno'): ?>checked='checked'<?php endif; ?> /> Potrdi
    <input type="radio" name="status" value="preklicano"  class="radio" <?php if (isset($narocilo["status"]) && $narocilo['status'] ==  'preklicano'): ?>checked='checked'<?php endif; ?> /> Preklici
    <?php if(isset($narocilo["status"]) and $narocilo["status"] == "potrjeno" ) { ?>
    <input type="radio" name="status" value="stornirano"  class="radio" <?php if (isset($narocilo["status"]) && $narocilo['status'] ==  'stornirano'): ?>checked='checked'<?php endif; ?> /> Storniraj
    <?php } ?>
    <p><button>Uredi naročilo</button></p>
</form>




