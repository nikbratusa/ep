<?php

require_once "DBInit.php";

class Narocilo_izdelekDB {

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, id_narocila, id_izdelek, kolicina, cena FROM narocilo_izdelek 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, id_narocila, id_izdelek, kolicina, cena FROM narocilo_izdelek");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, id_narocila, id_izdelek, kolicina, cena FROM narocilo_izdelek 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $izdelek = $statement->fetch();

        if ($izdelek!= null) {
            return $izdelek;
        } else {
            return null;
        }
    }

    public static function insert($id_narocila, $id_izdelek, $kolicina, $cena) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO narocilo_izdelek (id_narocila, id_izdelek, kolicina, cena)
            VALUES (:id_narocila, :id_izdelek, :kolicina, :cena)");
        $statement->bindParam(":id_narocila", $id_narocila);
        $statement->bindParam(":id_izdelek", $id_izdelek);
        $statement->bindParam(":kolicina", $kolicina);
        $statement->bindParam(":cena", $cena);
        $statement->execute();
    }

    public static function update($id, $id_narocila, $id_izdelek, $kolicina, $cena) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE narocilo_izdelek SET id_narocila = :id_narocila,
            id_izdelek = :id_izdelek, kolicina = :kolicina, cena = :cena WHERE id = :id");
        $statement->bindParam(":id_narocila", $id_narocila);
        $statement->bindParam(":id_izdelek", $id_izdelek);
        $statement->bindParam(":kolicina", $kolicina);
        $statement->bindParam(":cena", $cena);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM narocilo_izdelek WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }     
}
