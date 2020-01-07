<?php

require_once "DBInit.php";

class NarociloDB {

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, email, vsota, status FROM narocilo 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, email, vsota, status FROM narocilo");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, email, vsota, status FROM narocilo 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $narocilo = $statement->fetch();

        if ($narocilo != null) {
            return $narocilo;
        } else {
            return null;
        }
    }
    public static function getAllForEmail($email) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, email, vsota, status FROM narocilo
            WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();

        return $statement->fetchAll();
    }
   

    public static function insert($email, $vsota) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO narocilo (email, vsota)
            VALUES (:email, :vsota)");
        $statement->bindParam("email", $email);
        $statement->bindParam(":vsota", $vsota);
        $statement->execute();
        return $db->lastInsertId();
    }

    public static function update($id, $email, $vsota, $status) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE narocilo SET email = :email,
            vsota = :vsota, status = :status WHERE id = :id");
        $statement->bindParam(":email", $email);
        $statement->bindParam(":vsota", $vsota);
        $statement->bindParam(":status", $status);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
      
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM narocilo WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }     
}
