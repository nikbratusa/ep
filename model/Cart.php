<?php

require_once("model/ShoeDB.php");

class Cart {

    public static function getAll() {
        if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
            return [];
        }

        $ids = array_keys($_SESSION["cart"]);
        $cart = ShoeDB::getForIds($ids);

        // Adds a quantity field to each book in the list
        foreach ($cart as &$shoe) {
            $shoe["quantity"] = $_SESSION["cart"][$shoe["id"]];
        }

        return $cart;
    }

    public static function add($id) {
        $shoe = ShoeDB::get($id);

        if ($shoe != null) {
            if (isset($_SESSION["cart"][$id])) {
                $_SESSION["cart"][$id] += 1;
            } else {
                $_SESSION["cart"][$id] = 1;
            }            
        }
    }

    public static function update($id, $quantity) {
        $shoe = ShoeDB::get($id);
        $quantity = intval($quantity);

        if ($shoe != null) {
            if ($quantity <= 0) {
                unset($_SESSION["cart"][$id]);
            } else {
                $_SESSION["cart"][$id] = $quantity;
            }
        }
    }

    public static function purge() {
        unset($_SESSION["cart"]);
    }

    public static function total() {
        return array_reduce(self::getAll(), function ($total, $shoe) {
            return $total + $shoe["price"] * $shoe["quantity"];
        }, 0);
    }
}
