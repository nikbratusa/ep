<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Edit entry</title>

<h1>Edit shoe</h1>

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

<form action="<?= BASE_URL . "shoe/edit" ?>" method="post">
    <input type="hidden" name="id" value="<?= $shoe["id"] ?>"  />
    <p><label>Brand: <input type="text" name="brand" value="<?= $shoe["brand"] ?>" autofocus /></label></p>
    <p><label>Name: <input type="text" name="name" value="<?= $shoe["name"] ?>" /></label></p>
    <p><label>Price: <input type="number" name="price" value="<?= $shoe["price"] ?>" /></label></p>
    <p><label>Size: <input type="number" name="size" value="<?= $shoe["size"] ?>" /></label></p>
    <p><button>Update record</button></p>
</form>

<form action="<?= BASE_URL . "shoe/delete" ?>" method="post">
    <input type="hidden" name="id" value="<?= $shoe["id"] ?>"  />
    <label>Delete? <input type="checkbox" name="delete_confirmation" /></label>
    <button type="submit" class="important">Delete record</button>
</form>
