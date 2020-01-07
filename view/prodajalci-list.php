<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Shoes</title>

<h1>All Shoes</h1>


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
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "administrator" ) { ?>
    <a href="<?= BASE_URL . "prodajalci" ?>">Prodajalci</a>  |
<?php } ?>
]</p>

<ul>
    <?php foreach ($prodajalci as $p): ?>
        <li><a href="<?= BASE_URL . "prodajalci?id=" . $p["id"] ?>"><?= $p["ime"] ?> 
        	<?= $p["priimek"] ?> (<?= $p["email"] ?>), <?= $p["status"] ?></a></li>
    <?php endforeach; ?>

</ul>
<p><button><a href="<?= BASE_URL . "prodajalci/add" ?>">Dodaj prodajalca</a></button></p>
