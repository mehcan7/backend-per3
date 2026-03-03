<?php

class SneakerModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT
            SMPS.Id,
            SMPS.Merk,
            SMPS.Model,
            SMPS.Type,
            SMPS.Materiaal,
            SMPS.Gewicht,
            DATE_FORMAT(SMPS.Releasedatum, "%d/%m/%Y") as Releasedatum
        FROM Sneakers as SMPS
        ORDER BY
            SMPS.Merk DESC,
            SMPS.Model DESC,
            SMPS.Type DESC,
            SMPS.Materiaal DESC,
            SMPS.Gewicht DESC,
            SMPS.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }




    public function delete($Id)
{
    $sql = "DELETE
            FROM Smartphones
            WHERE Id = :Id";

    $this->db->query($sql);

    $this->db->bind(':Id', $Id, PDO::PARAM_INT);

    return $this->db->execute();
}
}
