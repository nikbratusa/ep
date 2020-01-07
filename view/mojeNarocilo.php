<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Narocilo</title>

<h1>Narocilo</h1>

<p>[
<a href="<?= BASE_URL . "shoe" ?>">All shoes</a> |
<a href="<?= BASE_URL . "shoe/add" ?>">Add new</a> |
<a href="<?= BASE_URL . "store" ?>">Shoestore</a>
]</p>

<h2>Zakjuček nakupa</h2>
<ul>

    <?php foreach ($cart as $shoe): ?>
        <li>Znamka:<?= $shoe["brand"] ?>, Ime:<?= $shoe["name"] ?>, Številka: <?= $shoe["size"] ?>, Količina: <?= $shoe["quantity"] ?>, Cena: <?= $shoe["quantity"] * $shoe["price"] ?></a></li>
    <?php endforeach; ?>
   
</ul>

<p>Total: <b><?= number_format($total, 2) ?> EUR</b></p>

<form action="<?= BASE_URL . "store/narociloPotrdi" ?>" method="post">
    <p><button>Potrdi naročilo</button></p>
</form>