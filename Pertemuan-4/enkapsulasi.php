<?php

class Mobil {
    private $merek;
    private $warna;
    private $kecepatan;

    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->setWarna($warna);
        $this->setKecepatan($kecepatan);
    }

    // Getter untuk setiap properti
    public function getMerek() {
        return $this->merek;
    }

    public function getWarna() {
        return $this->warna;
    }

    public function getKecepatan() {
        return $this->kecepatan;
    }

    // Setter kecepatan dengan validasi
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            echo "Kecepatan tidak boleh negatif\n";
            return;
        }
        if ($kecepatan > 200) {
            echo "Kecepatan maksimal 200 km/jam\n";
            return;
        }
        $this->kecepatan = $kecepatan;
    }

    // Setter warna dengan validasi
    public function setWarna($warna) {
        if (empty($warna)) {
            echo "Warna tidak boleh kosong\n";
            return;
        }
        if (strlen($warna) < 3) {
            echo "Warna minimal 3 karakter\n";
            return;
        }
        $this->warna = $warna;
    }

    public function getInfo() {
        echo "Merek: {$this->getMerek()}, Warna: {$this->getWarna()}, Kecepatan: {$this->getKecepatan()} km/jam\n";
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