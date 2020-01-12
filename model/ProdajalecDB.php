<?php

require_once "DBInit.php";

class ProdajalecDB {

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo, status FROM prodajalec 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo, status FROM prodajalec");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo, status FROM prodajalec 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $prodajalec = $statement->fetch();

        if ($prodajalec != null) {
            return $prodajalec;
        } else {
            return null;
        }
    }
     public static function getLogin($email) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, ime, priimek, email, geslo, status FROM prodajalec 
            WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();

        $prodajalec = $statement->fetch();

        if ($prodajalec != null) {
            return $prodajalec;
        } else {
            return null;
        }
    }

    public static function insert($ime, $priimek, $email, $geslo) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO prodajalec (ime, priimek, email, geslo)
            VALUES (:ime, :priimek, :email, :geslo)");
        $statement->bindParam(":ime", $ime);
        $statement->bindParam(":priimek", $priimek);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":geslo", $geslo);
        $statement->execute();
        return $db->lastInsertId();
    }

    public static function update($id, $ime, $priimek, $email, $geslo, $status) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE prodajalec SET ime = :ime,
            priimek = :priimek, email = :email, geslo = :geslo, status =:status WHERE id = :id");
        $statement->bindParam(":ime", $ime);
        $statement->bindParam(":priimek", $priimek);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":geslo", $geslo);
        $statement->bindParam(":status", $status);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM prodajalec WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }    
 
}

