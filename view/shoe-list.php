<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Shoes</title>

<h1>All Shoes</h1>

<p>[
<a href="<?= BASE_URL . "shoe" ?>">All shoes</a> |
<a href="<?= BASE_URL . "shoe/add" ?>">Add new</a> |
<a href="<?= BASE_URL . "store" ?>">Shoestore</a>
]</p>

<ul>

    <?php foreach ($shoes as $shoe): ?>
        <li><a href="<?= BASE_URL . "shoe?id=" . $shoe["id"] ?>"><?= $shoe["brand"] ?>: 
        	<?= $shoe["name"] ?> (<?= $shoe["size"] ?>)</a></li>
    <?php endforeach; ?>

</ul>
