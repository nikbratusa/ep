<?php

require_once("model/ShoeDB.php");
require_once("model/NarociloDB.php");
require_once("model/Narocilo_izdelekDB.php");
require_once("model/Cart.php");
require_once("ViewHelper.php");

class ShoeController {

    public static function index() {
        if (isset($_GET["id"])) {
            ViewHelper::render("view/shoe-detail.php", ["shoe" => ShoeDB::get($_GET["id"])]);
        } else {
            ViewHelper::render("view/shoe-list.php", ["shoes" => ShoeDB::getAll()]);
        }
    }

    public static function showAddForm($values = ["brand" => "", "name" => "",
        "price" => "", "size" => ""]) {
        ViewHelper::render("view/shoe-add.php", $values);
    }

    public static function add() {
        $validData = isset($_POST["brand"]) && !empty($_POST["brand"]) &&
                isset($_POST["name"]) && !empty($_POST["name"]) &&
                isset($_POST["price"]) && !empty($_POST["price"]) &&
                isset($_POST["size"]) && !empty($_POST["size"]);

        if ($validData) {
            ShoeDB::insert($_POST["brand"], $_POST["name"], $_POST["price"], $_POST["size"]);
            ViewHelper::redirect(BASE_URL . "shoe");
        } else {
            self::showAddForm($_POST);
        }
    }

    public static function showEditForm($shoe = []) {
        if (empty($shoe)) {
            $shoe = shoeDB::get($_GET["id"]);
        }

        ViewHelper::render("view/shoe-edit.php", ["shoe" => $shoe]);
    }

    public static function edit() {
        $validData = isset($_POST["brand"]) && !empty($_POST["brand"]) &&
                isset($_POST["name"]) && !empty($_POST["name"]) &&
                isset($_POST["price"]) && !empty($_POST["price"]) &&
                isset($_POST["size"]) && !empty($_POST["size"]) &&
                isset($_POST["status"]) && !empty($_POST["status"]) &&
                isset($_POST["id"]) && !empty($_POST["id"]);

        if ($validData) {
            ShoeDB::update($_POST["id"], $_POST["brand"], $_POST["name"], $_POST["price"], $_POST["size"], $_POST["status"]);
            ViewHelper::redirect(BASE_URL . "shoe?id=" . $_POST["id"]);
        } else {
            self::showEditForm($_POST);
        }
    }

    public static function delete() {
        $validDelete = isset($_POST["delete_confirmation"]) && isset($_POST["id"]) && !empty($_POST["id"]);

        if ($validDelete) {
            ShoeDB::delete($_POST["id"]);
            $url = BASE_URL . "shoe";
        } else {
            if (isset($_POST["id"])) {
                $url = BASE_URL . "shoe/edit?id=" . $_POST["id"];
            } else {
                $url = BASE_URL . "shoe";
            }
        }

        ViewHelper::redirect($url);
    }
    
    public static function narocilo() {
        $vars = [
            "shoes" => ShoeDB::getAll(),
            "cart" => Cart::getAll(),
            "total" => Cart::total()
        ];

        ViewHelper::render("view/mojeNarocilo.php", $vars);
    }
    public static function narociloPotrdi() {
        $shoes = ShoeDB::getAll();
        $cart = Cart::getAll();
        $vsota = Cart::total();
        
        $email = $_SESSION["email"];
        $id_narocila = NarociloDB::insert($email, $vsota);
        
        foreach ($cart as $shoe){
            Narocilo_izdelekDB::insert($id_narocila, $shoe["id"], $shoe["quantity"], $shoe["quantity"] * $shoe["price"]);
        }
        
        $vars = [
            "shoes" => ShoeDB::getAll(),
            "cart" => Cart::purge(),
            "total" => Cart::total()
        ];

        ViewHelper::redirect(BASE_URL . "store", $vars);
        
      
    }
    public static function preglejNarocila() {
        $vars = [
            "shoes" => ShoeDB::getAll(),
            "cart" => Cart::getAll(),
            "total" => Cart::total(),
            "narocila" => NarociloDB::getAllForEmail($_SESSION["email"])
        ];
        ViewHelper::render("view/narocila.php", $vars);
        
    }
    
     public static function vsaNarocila() {
        if (isset($_GET["id"])) {
            $narocila  = NarociloDB::get($_GET["id"]);
            $izdelki = Narocilo_izdelekDB::getAllForIdNarocila($_GET["id"]);
            $ids = [];
            foreach ($izdelki as $i){
                array_push($ids,$i["id_izdelek"]);
            }
            ViewHelper::render("view/narocila-detail.php", ["narocila" => NarociloDB::get($_GET["id"]),
                                                            "izdelki" => Narocilo_izdelekDB::getAllForIdNarocila($_GET["id"]),
                                                            "shoes" => ShoeDB::getForIds($ids)]);
        } else {
            ViewHelper::render("view/narocila-list.php", ["cakajoca" => NarociloDB::getAllCakajoca(),
                                                          "potrjena" => NarociloDB::getAllPotrjena(),
                                                          "preklicana" => NarociloDB::getAllPreklicana(),
                                                          "stornirana" => NarociloDB::getAllStornirana()]);
        }
    }
    
    public static function showEditFormNarocilo($narocilo = []) {
        if (empty($narocilo)) {
            $narocilo = NarociloDB::get($_GET["id"]);
        }

        ViewHelper::render("view/narocila-edit.php", ["narocilo" => $narocilo]);
    }

    public static function editNarocilo() {
        $validData = isset($_POST["id"]) && !empty($_POST["id"]) &&
                isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["vsota"]) && !empty($_POST["vsota"]) &&
                isset($_POST["status"]) && !empty($_POST["status"]);
            

        if ($validData) {
            NarociloDB::update($_POST["id"], $_POST["email"], $_POST["vsota"], $_POST["status"]);
            ViewHelper::redirect(BASE_URL . "store/narocila?id=" . $_POST["id"]);
        } else {
            self::showEditFormNarocilo($_POST);
        }
    }

}
