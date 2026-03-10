<?php

class HorlogeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT
            SMPH.Id,
            SMPH.Merk,
            SMPH.Model,
            SMPH.Type,
            SMPH.Materiaal,
            SMPH.Diameter,
            DATE_FORMAT(SMPH.Releasedatum, "%d/%m/%Y") as Releasedatum
        FROM Horloges as SMPH
        ORDER BY
            SMPH.Merk DESC,
            SMPH.Model DESC,
            SMPH.Type DESC,
            SMPH.Materiaal DESC,
            SMPH.Diameter DESC,
            SMPH.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }




    public function delete($Id)
    {
        $sql = "DELETE
                FROM Horloges
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Horloges (
                    Merk,
                    Model,
                    Type,
                    Materiaal,
                    Diameter,
                    Releasedatum
                )
                VALUES (
                    :merk,
                    :model,
                    :type,
                    :materiaal,
                    :diameter,
                    :releasedatum
                )";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':diameter', $data['diameter'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}