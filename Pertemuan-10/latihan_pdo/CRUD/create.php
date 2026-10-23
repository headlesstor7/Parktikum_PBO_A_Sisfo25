<?php
require_once '../Catatan.php';

$c = new Catatan();
$c->setJudul("pbo");
$c->setIsi("pbo adalah mata kuliah yang menyenangkan");
$hasil = $c->save();

echo $hasil ? "Berhasil disimpan" : "Gagal";
