<?php

class Mobil {
    public $merek;
    public $warna;
    public $kecepatan;

    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    public function getInfo() {
        echo "Merek: {$this->merek}, Warna: {$this->warna}, Kecepatan: {$this->kecepatan} km/jam\n";
    }

    public function jalankan() {
        echo "Mobil berjalan...\n";
    }

    public function berhenti() {
        echo "Mobil berhenti\n";
    }
}

$mobil1 = new Mobil("Toyota Avanza", "Silver", 120);
$mobil2 = new Mobil("Honda Brio", "Merah", 100);
$mobil3 = new Mobil("Suzuki Ertiga", "Putih", 110);

$mobil1->getInfo();
$mobil1->jalankan();
$mobil1->berhenti();

$mobil2->getInfo();
$mobil2->jalankan();
$mobil2->berhenti();

$mobil3->getInfo();
$mobil3->jalankan();
$mobil3->berhenti();