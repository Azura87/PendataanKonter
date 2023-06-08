<?php 

class Stuff_Model{
    private $db;
    private $table = 'tb_barang';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStuff()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getStuffById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataBarang($data)
    {
        $query = "INSERT INTO tb_barang
                    VALUES
                  ('', :nama, :nomor, :merk, :jumlah, :harga)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nomor', $data['nomor']);
        $this->db->bind('merk', $data['merk']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBarang($id)
    {
        $query = "DELETE FROM tb_barang WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataBarang($data)
    {
        $query = "UPDATE tb_barang SET
                    nama = :nama,
                    nomor = :nomor,
                    merk = :merk,
                    jumlah = :jumlah,
                    harga = :harga
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nomor', $data['nomor']);
        $this->db->bind('merk', $data['merk']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    
}

?>