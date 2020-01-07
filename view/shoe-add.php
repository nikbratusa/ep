<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Add entry</title>

<h1>Add new shoes</h1>

<p>[
<a href="<?= BASE_URL . "shoe" ?>">All shoes</a> |
<a href="<?= BASE_URL . "shoe/add" ?>">Add new</a> |
<a href="<?= BASE_URL . "store" ?>">Shoestore</a>
]</p>

<form action="<?= BASE_URL . "shoe/add" ?>" method="post">
    <p><label>Brand: <input type="text" name="brand" value="<?= $brand ?>" autofocus /></label></p>
    <p><label>Name: <input type="text" name="name" value="<?= $name ?>" /></label></p>
    <p><label>Price: <input type="number" name="price" value="<?= $price ?>" /></label></p>
    <p><label>Size: <input type="number" name="size" value="<?= $size ?>" /></label></p>
    <p><button>Insert</button></p>
</form>
