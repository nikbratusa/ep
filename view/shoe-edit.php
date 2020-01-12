<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Uredi čevlje</title>

<h1>Uredi čevlje</h1>

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

<form action="<?= BASE_URL . "shoe/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $shoe["id"] ?>"  />
    <p><label>Znamka: <input type="text" name="brand" pattern="[A-Za-z0-9čćžš\s]+" oninput="setCustomValidity('')" value="<?= htmlspecialchars($shoe["brand"]) ?>" required autofocus /></label></p>
    <p><label>Ime: <input type="text" name="name" pattern="[A-Za-z0-9čćžš\s]+" oninput="setCustomValidity('')" value="<?= htmlspecialchars($shoe["name"]) ?>" required /></label></p>
    <p><label>Cena: <input type="number" name="price" value="<?= htmlspecialchars($shoe["price"]) ?>"required /></label></p>
    <p><label>Velikost: <input type="number" name="size" value="<?= htmlspecialchars($shoe["size"]) ?>" required /></label></p>
    <input type="radio" name="status" value="aktiviran" class="radio" <?php if (isset($shoe["status"]) && $shoe["status"] == 'aktiviran'): ?>checked='checked'<?php endif; ?> /> Aktiviran
    <input type="radio" name="status" value="neaktiviran" class="radio" <?php if (isset($shoe["status"]) && $shoe['status'] == 'neaktiviran'): ?>checked='checked'<?php endif; ?> /> Neaktiviran
    <p><button>Uredi</button></p>
</form>

<script type="text/javascript">
    var ime = document.getElementsByName('name')[0];
    var znamka = document.getElementsByName('brand')[0];
    
    ime.oninvalid = function(event) {
        event.target.setCustomValidity('Ime lahko vsebuje samo male/velike črke!');
    }
    znamka.oninvalid = function(event) {
        event.target.setCustomValidity('Znamka lahko vsebuje samo male/velike črke!');
    }
</script>

