<?php
abstract class LayananOjek {
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    // getter
    public function getId() {
        return $this->id;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getHargaDasar() {
        return $this->hargaDasar;
    }

    // abstract method
    abstract public function hitungTotal();
    abstract public function getJenis();
}

class Motor extends LayananOjek {
    private $km;

    public function __construct($id, $nama, $hargaDasar, $km) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->km = $km;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (2000 * $this->km);
    }

    public function getJenis() {
        return "Motor";
    }

    public function cetakDetail() {
        echo "Motor | " . $this->nama . " | Jarak: " . $this->km . " km | Total: Rp " . number_format($this->hitungTotal()) . "<br>";
    }
}
class Mobil extends LayananOjek {
    private $km;

    public function __construct($id, $nama, $hargaDasar, $km) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->km = $km;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (4000 * $this->km);
    }

    public function getJenis() {
        return "Mobil";
    }

    public function cetakDetail() {
        echo "Mobil | " . $this->nama . " | Jarak: " . $this->km . " km | Total: Rp " . number_format($this->hitungTotal()) . "<br>";
    }
}

class Barang extends LayananOjek {
    private $kg;

    public function __construct($id, $nama, $hargaDasar, $kg) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->kg = $kg;
    }

    public function hitungTotal() {
        $total = $this->hargaDasar + (3000 * $this->kg);

        // diskon 10% jika berat lebih dari 5 kg
        if ($this->kg > 5) {
            $total = $total - ($total * 0.1);
        }

        return $total;
    }

    public function getJenis() {
        return "Barang";
    }

    public function cetakDetail() {
        echo "Barang | " . $this->nama . " | Berat: " . $this->kg . " kg | Total: Rp " . number_format($this->hitungTotal()) . "<br>";
    }
}

$o1 = new Motor("OJ001", "Rezki Firmansyah", 5000, 4);
$o2 = new Mobil("OJ002", "Indra Prianto", 8000, 6);
$o3 = new Barang("OJ003", "Zuhayr Aljabar", 3000, 8);
$o4 = new Motor("OJ004", "Citra", 5000, 10);
$o5 = new Barang("OJ005", "Dimas", 3000, 3);

// simpan dalam array
$daftar = array($o1, $o2, $o3, $o4, $o5);

$totalSemua = 0;

echo "<h3>Detail Layanan</h3>";

// looping array
foreach ($daftar as $d) {
    $d->cetakDetail();

    $totalSemua = $totalSemua + $d->hitungTotal();
}

echo "<h4>Total Keseluruhan: Rp " . number_format($totalSemua) . "</h4>";

?>
