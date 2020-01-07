<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Shoe detail</title>

<h1>Details of: <?= $shoe["name"] ?></h1>

<p>[
<a href="<?= BASE_URL . "shoe" ?>">All shoes</a> |
<a href="<?= BASE_URL . "shoe/add" ?>">Add new</a> |
<a href="<?= BASE_URL . "store" ?>">Shoestore</a>
]</p>

<ul>
    <li>Brand: <b><?= $shoe["brand"] ?></b></li>
    <li>Name: <b><?= $shoe["name"] ?></b></li>
    <li>Price: <b><?= $shoe["price"] ?> EUR</b></li>
    <li>Size: <b><?= $shoe["size"] ?></b></li>
</ul>

<p>[ <a href="<?= BASE_URL . "shoe/edit?id=" . $_GET["id"] ?>">Edit</a> |
<a href="<?= BASE_URL . "shoe" ?>">Shoe index</a> ]</p>
