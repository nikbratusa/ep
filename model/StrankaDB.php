<?php

require_once "DBInit.php";

class StrankaDB {

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, ime, priimek, email, naslov, telefon, geslo, status FROM stranka 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, naslov, telefon, geslo, status FROM stranka");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, naslov, telefon, geslo, status FROM stranka 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $stranka = $statement->fetch();

        if ($stranka != null) {
            return $stranka;
        } else {
            return null;
        }
    }
     public static function getLogin($email, $geslo) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, naslov, telefon, geslo, status FROM stranka
            WHERE email = :email AND geslo = :geslo");
        $statement->bindParam(":email", $email);
        $statement->bindParam(":geslo", $geslo);
        $statement->execute();

        $stranka = $statement->fetch();

        if ($stranka != null) {
            return $stranka;
        } else {
            return null;
        }
    }

    public static function insert($ime, $priimek, $email, $naslov, $telefon, $geslo) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO stranka (ime, priimek, email, naslov, telefon, geslo)
            VALUES (:ime, :priimek, :email, :naslov, :telefon, :geslo)");
        $statement->bindParam(":ime", $ime);
        $statement->bindParam(":priimek", $priimek);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":naslov", $naslov);
        $statement->bindParam(":telefon", $telefon);
        $statement->bindParam(":geslo", $geslo);
        $statement->execute();
        return $db->lastInsertId();
    }

    public static function update($id, $ime, $priimek, $email, $naslov, $telefon, $geslo, $status) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE stranka SET ime = :ime,
            priimek = :priimek, email = :email, naslov = :naslov, telefon = :telefon, geslo = :geslo, status =:status WHERE id = :id");
        $statement->bindParam(":ime", $ime);
        $statement->bindParam(":priimek", $priimek);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":naslov", $naslov);
        $statement->bindParam(":telefon", $telefon);
        $statement->bindParam(":geslo", $geslo);
        $statement->bindParam(":status", $status);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM stranka WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }    
 
}
