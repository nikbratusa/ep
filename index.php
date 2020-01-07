<?php

// enables sessions for the entire app
session_start();

require_once("controller/ShoeController.php");
require_once("controller/StoreController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

/* Uncomment to see the contents of variables
var_dump(BASE_URL);
var_dump(IMAGES_URL);
var_dump(CSS_URL);
var_dump($path);
exit(); */

$urls = [
    "shoe" => function () {
       ShoeController::index();
    },
    "shoe/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ShoeController::add();
        } else {
            ShoeController::showAddForm();
        }
    },
    "shoe/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ShoeController::edit();
        } else {
            ShoeController::showEditForm();
        }
    },
    "shoe/delete" => function () {
        ShoeController::delete();
    },
    "prijava" => function () {
       StoreController::prijava();
    },
    "prijavaPreveri" => function () {
       StoreController::prijavaPreveri();
    },
    "odjava" => function () {
       StoreController::odjava();
    },
    "registracija" => function () {
       StoreController::registracija();
    },
    "registracijaUstvari" => function () {
       StoreController::registracijaUstvari();
    },
    "mojProfil" => function () {
       StoreController::mojProfil();
    },
    "posodobi" => function () {
       StoreController::posodobi();
    },
    "prodajalci" => function () {
       StoreController::prodajalci();
    },
    "prodajalci/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            StoreController::editProdajalec();
        } else {
            StoreController::showEditFormProdajalec();
        }
    },
    "prodajalci/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            StoreController::addProdajalec();
        } else {
            StoreController::showAddFormProdajalec();
        }
    },
    "prodajalci/delete" => function () {
        StoreController::deleteProdajalec();
    },
    "store" => function () {
        StoreController::index();
    },
    "store/add-to-cart" => function () {
        StoreController::addToCart();
    },
    "store/update-cart" => function () {
        StoreController::updateCart();
    },
    "store/purge-cart" => function () {
        StoreController::purgeCart();
    },
    "store/narocilo" => function () {
       ShoeController::narocilo();
    },
    "store/narociloPotrdi" => function () {
       ShoeController::narociloPotrdi();
    },
    "store/narocilaPregled" => function () {
       ShoeController::preglejNarocila();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "store");
    },
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 
