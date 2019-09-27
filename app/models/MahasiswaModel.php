<?php


class MahasiswaModel
{


    private $table = 'mahasiswa';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllMahasiswa()
    {
        $this->db->query(
            "SELECT * FROM {$this->table}"
        );
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE id=:id"
        );
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query =
            "INSERT INTO {$this->table} VALUES
                (0, :nama, :nim)";
        $this->db->query($query);
        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('nim', $data["nim"]);
        $this->db->execute();


        return $this->db->rowCount();
    }


    public function deleteDataMahasiswa($id)
    {
        $query =
            "DELETE FROM {$this->table} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();


        return $this->db->rowCount();
    }
}