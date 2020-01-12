<?php

require_once "DBInit.php";

class AdministratorDB {

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo FROM administrator 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo FROM administrator");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo FROM administrator 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $admin = $statement->fetch();

        if ($admin != null) {
            return $admin;
        } else {
            throw new InvalidArgumentException("No record with id $id");
        }
    }
    
    public static function getLogin($email) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo FROM administrator 
            WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();

        $admin = $statement->fetch();

        if ($admin != null) {
            return $admin;
        } else {
            return null;
        }
    }
    
  

    public static function insert($ime, $priimek, $email, $geslo) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO administrator (ime, priimek, email, geslo)
            VALUES (:ime, :priimek, :email, :geslo)");
        $statement->bindParam(":ime", $ime);
        $statement->bindParam(":priimek", $priimek);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":geslo", $geslo);
        $statement->execute();
    }

    public static function update($id, $ime, $priimek, $email, $geslo) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE administrator SET ime = :ime,
            priimek = :priimek, email = :email, geslo = :geslo WHERE id = :id");
        $statement->bindParam(":ime", $ime);
        $statement->bindParam(":priimek", $priimek);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":geslo", $geslo);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    } 
}


