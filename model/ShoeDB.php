<?php


require_once 'AbstractDB.php';

class ShoeDB extends AbstractDB {

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, brand, name, price, size, status FROM shoe 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, brand, name, price, size, status FROM shoe");
        $statement->execute();

        return $statement->fetchAll();
    }
    
    public static function getAllActive() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, brand, name, price, size, status FROM shoe WHERE status = 'aktiviran'");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, brand, name, price, size, status FROM shoe 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $shoe = $statement->fetch();

        if ($shoe != null) {
            return $shoe;
        } else {
            throw new InvalidArgumentException("No record with id $id");
        }
    }

    public static function insert($brand, $name, $price, $size) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO shoe (brand, name, price, size)
            VALUES (:brand, :name, :price, :size)");
        $statement->bindParam(":brand", $brand);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":size", $size);
        $statement->execute();
    }

    public static function update($id, $brand, $name, $price, $size, $status) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE shoe SET brand = :brand,
            name = :name, price = :price, size = :size, status = :status WHERE id = :id");
        $statement->bindParam(":brand", $brand);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":size", $size);
        $statement->bindParam(":status", $status);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM shoe WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }  
    
    public static function getShoe(array $id) {
        return parent::query("SELECT id, brand, name, price, size"
                        . " FROM shoe"
                        . " WHERE id = :id", $id);
    }
    public static function getAllShoes() {
        return parent::query("SELECT id, brand, name, price, size"
                        . " FROM shoe"
                        . " ORDER BY id ASC");
    }
}
