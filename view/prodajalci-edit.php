<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Uredi prodajalca</title>

<h1>Uredi prodajalca</h1>

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
<form action="<?= BASE_URL . "prodajalci/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($prodajalec["id"]) ?>"  />
    <p><label>Ime: <input type="text" pattern="[A-Za-zčćžš]+" oninput="setCustomValidity('')" name="ime" value="<?= htmlspecialchars($prodajalec["ime"]) ?>" required autofocus /></label></p>
    <p><label>Priimek: <input type="text" pattern="[A-Za-zčćžš]+" oninput="setCustomValidity('')" name="priimek" value="<?= htmlspecialchars($prodajalec["priimek"]) ?>"required /></label></p>
    <p><label>Email: <input type="email" name="email" value="<?= htmlspecialchars($prodajalec["email"]) ?>" required /></label></p>
    <p><label>Geslo: <input type="password" name="geslo" required /></label></p>
    <input type="radio" name="status" value="aktiviran" class="radio" <?php if (isset($prodajalec["status"]) && $prodajalec["status"] == 'aktiviran'): ?>checked='checked'<?php endif; ?> /> Aktiviran
    <input type="radio" name="status" value="neaktiviran" class="radio" <?php if (isset($prodajalec["status"]) && $prodajalec['status'] == 'neaktiviran'): ?>checked='checked'<?php endif; ?> /> Neaktiviran
    
    <p><button>Uredi</button></p>
</form>

<form action="<?= BASE_URL . "prodajalci/delete" ?>" method="post">
    <input type="hidden" name="id" value="<?= $prodajalec["id"] ?>"  />
    <label>Izbriši? <input type="checkbox" name="delete_confirmation" /></label>
    <button type="submit" class="important">Izbriši prodajalca</button>
</form>

<script type="text/javascript">
    var ime = document.getElementsByName('ime')[0];
    var priimek = document.getElementsByName('priimek')[0];
    
    ime.oninvalid = function(event) {
        event.target.setCustomValidity('Ime lahko vsebuje samo male/velike črke!');
    }
    priimek.oninvalid = function(event) {
        event.target.setCustomValidity('Priimek lahko vsebuje samo male/velike črke!');
    }
</script>
