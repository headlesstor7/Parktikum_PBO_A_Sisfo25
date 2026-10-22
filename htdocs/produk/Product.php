<?php

require_once "DatabaseConnection.php";

class Product
{
    public $id;
    public $nama;
    public $harga;
    public $stok;

    private $db;

    public function __construct($nama = "", $harga = 0, $stok = 0)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->db = DatabaseConnection::getConnection();
    }

    // tambah data
    public function save()
    {
        $sql = "INSERT INTO products (nama, harga, stok) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$this->nama, $this->harga, $this->stok]);
    }

    // lihat semua data
    public function findAll()
    {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // lihat satu data
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update data
    public function update($id)
    {
        $sql = "UPDATE products SET nama = ?, harga = ?, stok = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$this->nama, $this->harga, $this->stok, $id]);
    }

    // hapus data
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}