<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>ShoeStore</title>

<h1>ShoeStore</h1>

<p>[
<a href="<?= BASE_URL . "shoe" ?>">All shoes</a> |
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "prodajalec" ) { ?>
    <a href="<?= BASE_URL . "shoe/add" ?>">Add new</a>  |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka") { ?>
    <a href="<?= BASE_URL . "store" ?>">Buy shoes</a> |
<?php } ?>
<?php if(!isset($_SESSION["ime"])) { ?>
    <a href="<?= BASE_URL . "prijava" ?>">Prijava</a> | |
    <?php } else {?>
    <a href="<?= BASE_URL . "odjava" ?>">Odjava</a> ||
    <?php } ?>
<?php if(!isset($_SESSION["vloga"])) { ?>
    <a href="<?= BASE_URL . "registracija" ?>">Registracija</a> |
<?php } ?>
<?php if(isset($_SESSION["vloga"])) { ?>
    <a href="<?= BASE_URL . "mojProfil" ?>">Moj Profil</a>  |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "administrator" ) { ?>
    <a href="<?= BASE_URL . "prodajalci" ?>">Prodajalci</a>  |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "prodajalec" ) { ?>
    <a href="<?= BASE_URL . "stranke" ?>">Stranke</a>
    <a href="<?= BASE_URL . "store/narocila" ?>">Vsa narocila</a> |
<?php } ?>
<?php if(isset($_SESSION["vloga"]) and $_SESSION["vloga"] == "stranka" ) { ?>
    <a href="<?= BASE_URL . "store/narocilaPregled" ?>">Moja narocila</a>  |
<?php } ?>
]</p>


<div id="main">
    <?php foreach ($shoes as $shoe): ?>

        <div class="shoe">
            <form action="<?= BASE_URL . "store/add-to-cart" ?>" method="post" />
                <input type="hidden" name="id" value="<?= $shoe["id"] ?>" />
                <p><?= $shoe["brand"] ?></p>
                <p><?= $shoe["name"] ?></p> 
                <p><?= $shoe["size"] ?></p>
                <p><?= number_format($shoe["price"], 2) ?> EUR<br/>
                <button>Add to cart</button>
            </form> 
        </div>

    <?php endforeach; ?>

</div>

<?php if (!empty($cart)): ?>

    <div id="cart">
        <h3>Shopping cart</h3>
        <?php foreach ($cart as $shoe): ?>

            <form action="<?= BASE_URL . "store/update-cart" ?>" method="post">
                <input type="hidden" name="id" value="<?= $shoe["id"] ?>" />
                <input type="number" name="quantity" value="<?= $shoe["quantity"] ?>" class="update-cart" />
                &times; <?= $shoe["name"] ?> 
                <button>Update</button> 
            </form>

        <?php endforeach; ?>

        <p>Total: <b><?= number_format($total, 2) ?> EUR</b></p>

        <form action="<?= BASE_URL . "store/purge-cart" ?>" method="post">
            <p><button>Purge cart</button></p>
        </form>
        <form action="<?= BASE_URL . "store/narocilo" ?>" method="post">
            <p><button>Naroci</button></p>
        </form>
    </div>    

<?php endif; ?>
