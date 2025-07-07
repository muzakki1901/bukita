<?php
class KategoriModel
{
    private $table = 'Kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahKategori($data)
    {
        $query = "INSERT INTO Kategori(nama_Kategori) VALUES(:nama_Kategori)";
        $this->db->query($query);
        $this->db->bind('nama_Kategori', $data['nama_Kategori']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    
    public function updateDataKategori($data)
    {
        $query = "UPDATE Kategori SET nama_Kategori=:nama_Kategori WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_Kategori', $data['nama_Kategori']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteKategori($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariKategori()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_Kategori LIKE :key');
        $this->db->bind('key', "$key%");
        return $this->db->resultSet();
    }
}
