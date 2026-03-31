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

    public function getSneakerById($Id)
    {
        $sql = 'SELECT
            SMPS.Id,
            SMPS.Merk,
            SMPS.Model,
            SMPS.Type,
            SMPS.Materiaal,
            SMPS.Gewicht,
            SMPS.Releasedatum
        FROM Sneakers as SMPS
        WHERE SMPS.Id = :Id';

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->single();
    }




    public function delete($Id)
{
    $sql = "DELETE
            FROM Sneakers
            WHERE Id = :Id";

    $this->db->query($sql);

    $this->db->bind(':Id', $Id, PDO::PARAM_INT);

    return $this->db->execute();
}

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers (
                    Merk,
                    Model,
                    Type,
                    Materiaal,
                    Gewicht,
                    Releasedatum
                )
                VALUES (
                    :merk,
                    :model,
                    :type,
                    :materiaal,
                    :gewicht,
                    :releasedatum
                )";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE Sneakers
                SET Merk = :merk,
                    Model = :model,
                    Type = :type,
                    Materiaal = :materiaal,
                    Gewicht = :gewicht,
                    Releasedatum = :releasedatum,
                    DatumGewijzigd = NOW(6)
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $data['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}
