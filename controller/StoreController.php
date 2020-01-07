<?php

require_once("model/ShoeDB.php");
require_once("model/AdministratorDB.php");
require_once("model/ProdajalecDB.php");
require_once("model/StrankaDB.php");
require_once("model/Cart.php");
require_once("ViewHelper.php");

class StoreController {

    public static function index() {
        $vars = [
            "shoes" => ShoeDB::getAll(),
            "cart" => Cart::getAll(),
            "total" => Cart::total()
        ];

        ViewHelper::render("view/store-index.php", $vars);
    }
    
    public static function prijava() {
        ViewHelper::render("view/prijava.php");
    }
    
    public static function odjava() {
        session_destroy ();
        session_start();
        ViewHelper::redirect(BASE_URL . "prijava");
    }
    
    public static function prijavaPreveri() {
        $email = $_POST['emailForm'];
        $geslo = $_POST['gesloForm'];
        $poglejProdajalec = false;
        $poglejStranka = false;
        $napaka = false;
        
        $admin = AdministratorDB::getLogin($email, $geslo);
        if($admin == null){
           $poglejProdajalec = true;
        }
        else{
            $vars = [
                "shoes" => ShoeDB::getAll(),
                "cart" => Cart::getAll(),
                "total" => Cart::total()
            ];
            $_SESSION["ime"] = $admin["ime"];
            $_SESSION["priimek"] = $admin["priimek"];
            $_SESSION["email"] = $admin["email"];
            $_SESSION["geslo"] = $admin["geslo"];
            $_SESSION["id"] = $admin["id"];
            $_SESSION["vloga"] = "administrator";
            ViewHelper::redirect(BASE_URL . "shoe", $vars);
        }
        if($poglejProdajalec){
            $prodajalec = ProdajalecDB::getLogin($email, $geslo);
            if($prodajalec == null){
                $poglejStranka = true;
            }
            else{
                $vars = [
                    "shoes" => ShoeDB::getAll(),
                    "cart" => Cart::getAll(),
                    "total" => Cart::total()
                ];
                $_SESSION["ime"] = $prodajalec["ime"];
                $_SESSION["priimek"] = $prodajalec["priimek"];
                $_SESSION["email"] = $prodajalec["email"];
                $_SESSION["geslo"] = $prodajalec["geslo"];
                $_SESSION["id"] = $prodajalec["id"];
                $_SESSION["status"] = $prodajalec["status"];
                $_SESSION["vloga"] = "prodajalec";
                ViewHelper::redirect(BASE_URL . "shoe", $vars);
            } 
        }
        if($poglejStranka){
            $stranka = StrankaDB::getLogin($email, $geslo);
            if($stranka == null){
                $napaka = true;
            }
            else{
                $vars = [
                    "shoes" => ShoeDB::getAll(),
                    "cart" => Cart::getAll(),
                    "total" => Cart::total()
                ];
                $_SESSION["ime"] = $stranka["ime"];
                $_SESSION["priimek"] = $stranka["priimek"];
                $_SESSION["email"] = $stranka["email"];
                $_SESSION["naslov"] = $stranka["naslov"];
                $_SESSION["telefon"] = $stranka["telefon"];
                $_SESSION["geslo"] = $stranka["geslo"];
                $_SESSION["id"] = $stranka["id"];
                $_SESSION["status"] = $stranka["status"];
                $_SESSION["vloga"] = "stranka";
                ViewHelper::redirect(BASE_URL . "store", $vars);
            } 
        }
        if($napaka){
            ViewHelper::redirect(BASE_URL . "prijava");
        }    
    }
    
    public static function registracija() {
       ViewHelper::render("view/registracija.php");
    }
    
    public static function registracijaUstvari() {
        $ime = $_POST['imeForm'];
        $priimek = $_POST['priimekForm'];
        $email = $_POST['emailForm'];
        $geslo = $_POST['gesloForm'];
        
        
    }
    public static function mojProfil() {
        ViewHelper::render("view/mojProfil.php");
    }
    
    public static function posodobi() {
       $ime = $_POST['imeForm'];
       $priimek = $_POST['priimekForm'];
       $email = $_POST['emailForm'];
       $geslo = $_POST['gesloForm'];
       $id = $_POST['idForm'];
       $vloga = $_POST['vlogaForm'];
       
       
       if($vloga == 'administrator'){
            if ($id !== null) {
                 AdministratorDB::update($id, $ime, $priimek, $email, $geslo);
                 $_SESSION["ime"] = $ime;
                 $_SESSION["priimek"] = $priimek;
                 $_SESSION["email"] = $email;
                 $_SESSION["geslo"] = $geslo;
                 $vars = [
                 "shoes" => ShoeDB::getAll(),
                 "cart" => Cart::getAll(),
                 "total" => Cart::total()
                 ];

                 ViewHelper::redirect(BASE_URL . "shoe", $vars);
            }
        }
        elseif($vloga == 'prodajalec'){
            if ($id !== null) {
                $status = $_SESSION["status"];
                ProdajalecDB::update($id, $ime, $priimek, $email, $geslo, $status);
                 $_SESSION["ime"] = $ime;
                 $_SESSION["priimek"] = $priimek;
                 $_SESSION["email"] = $email;
                 $_SESSION["geslo"] = $geslo;
                 $vars = [
                 "shoes" => ShoeDB::getAll(),
                 "cart" => Cart::getAll(),
                 "total" => Cart::total()
                 ];

                 ViewHelper::redirect(BASE_URL . "shoe", $vars);
            }
        }
        elseif($vloga == 'stranka'){
            if ($id !== null) {
                $naslov = $_POST['naslovForm'];
                $telefon = $_POST['telefonForm'];
                $status = $_SESSION["status"];
                StrankaDB::update($id, $ime, $priimek, $email, $naslov, $telefon, $geslo, $status);
                 $_SESSION["ime"] = $ime;
                 $_SESSION["priimek"] = $priimek;
                 $_SESSION["email"] = $email;
                 $_SESSION["naslov"] = $naslov;
                 $_SESSION["telefon"] = $telefon;
                 $_SESSION["geslo"] = $geslo;
                 $vars = [
                 "shoes" => ShoeDB::getAll(),
                 "cart" => Cart::getAll(),
                 "total" => Cart::total()
                 ];

                 ViewHelper::redirect(BASE_URL . "shoe", $vars);
            }
        }
       
       
    }
    
    public static function prodajalci() {
        if (isset($_GET["id"])) {
            ViewHelper::render("view/prodajalci-detail.php", ["prodajalci" => ProdajalecDB::get($_GET["id"])]);
        } else {
            ViewHelper::render("view/prodajalci-list.php", ["prodajalci" => ProdajalecDB::getAll()]);
        }
    }
    public static function editProdajalec() {
        $validData = isset($_POST["ime"]) && !empty($_POST["ime"]) &&
                isset($_POST["priimek"]) && !empty($_POST["priimek"]) &&
                isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["geslo"]) && !empty($_POST["geslo"]) &&
                isset($_POST["id"]) && !empty($_POST["id"]) &&
                isset($_POST["status"]) && !empty($_POST["status"]);

        if ($validData) {
            ProdajalecDB::update($_POST["id"], $_POST["ime"], $_POST["priimek"], $_POST["email"], $_POST["geslo"], $_POST["status"]);
            ViewHelper::redirect(BASE_URL . "prodajalci?id=" . $_POST["id"]);
        } else {
            self::showEditFormProdajalec($_POST);
        }
    }
    
    public static function showEditFormProdajalec($prodajalec = []) {
        if (empty($prodajalec)) {
            $prodajalec = ProdajalecDB::get($_GET["id"]);
        }

        ViewHelper::render("view/prodajalci-edit.php", ["prodajalec" => $prodajalec]);
    }
    public static function deleteProdajalec() {
        $validDelete = isset($_POST["delete_confirmation"]) && isset($_POST["id"]) && !empty($_POST["id"]);

        if ($validDelete) {
            ProdajalecDB::delete($_POST["id"]);
            $url = BASE_URL . "prodajalci";
        } else {
            if (isset($_POST["id"])) {
                $url = BASE_URL . "prodajalci/edit?id=" . $_POST["id"];
            } else {
                $url = BASE_URL . "prodajalci";
            }
        }

        ViewHelper::redirect($url);
    }
    
    public static function showAddFormProdajalec($values = ["ime" => "", "priimek" => "",
        "email" => "", "geslo" => ""]) {
        ViewHelper::render("view/prodajalci-add.php", $values);
    }

    public static function addProdajalec() {
        $validData = isset($_POST["ime"]) && !empty($_POST["ime"]) &&
                isset($_POST["priimek"]) && !empty($_POST["priimek"]) &&
                isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["geslo"]) && !empty($_POST["geslo"]);

        if ($validData) {
            ProdajalecDB::insert($_POST["ime"], $_POST["priimek"], $_POST["email"], $_POST["geslo"]);
            ViewHelper::redirect(BASE_URL . "prodajalci");
        } else {
            self::showAddFormProdajalec($_POST);
        }
    }
    
    public static function stranke() {
        if (isset($_GET["id"])) {
            ViewHelper::render("view/stranke-detail.php", ["stranke" => StrankaDB::get($_GET["id"])]);
        } else {
            ViewHelper::render("view/stranke-list.php", ["stranke" => StrankaDB::getAll()]);
        }
    }
    public static function editStranka() {
        $validData = isset($_POST["ime"]) && !empty($_POST["ime"]) &&
                isset($_POST["priimek"]) && !empty($_POST["priimek"]) &&
                isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["naslov"]) && !empty($_POST["naslov"]) &&
                isset($_POST["telefon"]) && !empty($_POST["telefon"]) &&
                isset($_POST["geslo"]) && !empty($_POST["geslo"]) &&
                isset($_POST["id"]) && !empty($_POST["id"]) &&
                isset($_POST["status"]) && !empty($_POST["status"]);

        if ($validData) {
            StrankaDB::update($_POST["id"], $_POST["ime"], $_POST["priimek"], $_POST["email"],$_POST["naslov"],$_POST["telefon"], $_POST["geslo"], $_POST["status"]);
            ViewHelper::redirect(BASE_URL . "stranke?id=" . $_POST["id"]);
        } else {
            self::showEditFormStranka($_POST);
        }
    }
    
    public static function showEditFormStranka($stranka = []) {
        if (empty($stranka)) {
            $stranka = StrankaDB::get($_GET["id"]);
        }

        ViewHelper::render("view/stranke-edit.php", ["stranka" => $stranka]);
    }
    
    public static function showAddFormStranka($values = ["ime" => "", "priimek" => "",
        "email" => "", "naslov" => "", "telefon" => "", "geslo" => ""]) {
        ViewHelper::render("view/stranke-add.php", $values);
    }
    
    public static function addStranka() {
        $validData = isset($_POST["ime"]) && !empty($_POST["ime"]) &&
                isset($_POST["priimek"]) && !empty($_POST["priimek"]) &&
                isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["naslov"]) && !empty($_POST["naslov"]) &&
                isset($_POST["telefon"]) && !empty($_POST["telefon"]) &&
                isset($_POST["geslo"]) && !empty($_POST["geslo"]);

        if ($validData) {
            StrankaDB::insert($_POST["ime"], $_POST["priimek"], $_POST["email"],$_POST["naslov"],$_POST["telefon"], $_POST["geslo"]);
            ViewHelper::redirect(BASE_URL . "stranke");
        } else {
            self::showAddForm($_POST);
        }
    }
    public static function deleteStranka() {
        $validDelete = isset($_POST["delete_confirmation"]) && isset($_POST["id"]) && !empty($_POST["id"]);

        if ($validDelete) {
            StrankaDB::delete($_POST["id"]);
            $url = BASE_URL . "stranke";
        } else {
            if (isset($_POST["id"])) {
                $url = BASE_URL . "stranke/edit?id=" . $_POST["id"];
            } else {
                $url = BASE_URL . "stranke";
            }
        }

        ViewHelper::redirect($url);
    }
    

    public static function addToCart() {
        $id = isset($_POST["id"]) ? intval($_POST["id"]) : null;

        if ($id !== null) {
            Cart::add($id);
        }

        ViewHelper::redirect(BASE_URL . "store");
    }

    public static function updateCart() {
        $id = (isset($_POST["id"])) ? intval($_POST["id"]) : null;
        $quantity = (isset($_POST["quantity"])) ? intval($_POST["quantity"]) : null;

        if ($id !== null && $quantity !== null) {
            Cart::update($id, $quantity);
        }

        ViewHelper::redirect(BASE_URL . "store");
    }

    public static function purgeCart() {
        Cart::purge();

        ViewHelper::redirect(BASE_URL . "store");
    }

}
