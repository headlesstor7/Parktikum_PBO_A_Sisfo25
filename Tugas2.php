<?php

class Product {
    public $nama;
    public $harga;
    public $kategori;

    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    public function getInfo() {
        echo "Nama: {$this->nama}, Harga: {$this->harga}, Kategori: {$this->kategori}\n";
    }

    public function applyDiskon($persen) {
        $this->harga = $this->harga - ($this->harga * $persen / 100);
    }
}

$product1 = new Product("Sepatu Sneakers", 500000, "Fashion");
$product2 = new Product("Laptop Asus", 8000000, "Elektronik");

$product1->getInfo();
$product1->applyDiskon(10);
$product1->getInfo();

$product2->getInfo();
$product2->applyDiskon(20);
$product2->getInfo();