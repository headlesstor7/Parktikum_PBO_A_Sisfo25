<?php

require_once "Product.php";

if (isset($_POST['simpan'])) {
    $produk = new Product($_POST['nama'], $_POST['harga'], $_POST['stok']);
    $produk->save();
    header("Location: index.php");
}

if (isset($_POST['update'])) {
    $produk = new Product($_POST['nama'], $_POST['harga'], $_POST['stok']);
    $produk->update($_POST['id']);
    header("Location: index.php");
}

if (isset($_GET['hapus'])) {
    $produk = new Product();
    $produk->delete($_GET['hapus']);
    header("Location: index.php");
}

$idEdit = "";
$namaEdit = "";
$hargaEdit = "";
$stokEdit = "";

if (isset($_GET['edit'])) {
    $produk = new Product();
    $data = $produk->findById($_GET['edit']);
    $idEdit = $data['id'];
    $namaEdit = $data['nama'];
    $hargaEdit = $data['harga'];
    $stokEdit = $data['stok'];
}

$produk = new Product();
$dataProduk = $produk->findAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Produk</title>
</head>
<body bgcolor="#eef2f5">

    <center>
        <h2><font color="#2c3e50">SISTEM MANAJEMEN PRODUK</font></h2>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $idEdit; ?>">

            <table bgcolor="#ffffff" border="1" bordercolor="#bdc3c7" cellpadding="10" cellspacing="0" width="350">
                <tr bgcolor="#3498db">
                    <th colspan="2">
                        <font color="#ffffff">Form Produk</font>
                    </th>
                </tr>
                <tr>
                    <td><b>Nama Produk</b></td>
                    <td><input type="text" name="nama" value="<?php echo $namaEdit; ?>" required></td>
                </tr>
                <tr>
                    <td><b>Harga</b></td>
                    <td><input type="number" name="harga" value="<?php echo $hargaEdit; ?>" required></td>
                </tr>
                <tr>
                    <td><b>Stok</b></td>
                    <td><input type="number" name="stok" value="<?php echo $stokEdit; ?>" required></td>
                </tr>
                <tr bgcolor="#f8f9fa">
                    <td colspan="2" align="center">
                        <?php if ($idEdit != "") { ?>
                            <button type="submit" name="update">Update</button>
                            <a href="index.php"><font color="#e74c3c">Batal</font></a>
                        <?php } else { ?>
                            <button type="submit" name="simpan">Simpan</button>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </form>

        <br>

        <table bgcolor="#ffffff" border="1" bordercolor="#bdc3c7" cellpadding="10" cellspacing="0" width="600">
            <tr bgcolor="#2c3e50">
                <th><font color="#ffffff">ID</font></th>
                <th><font color="#ffffff">Nama Produk</font></th>
                <th><font color="#ffffff">Harga</font></th>
                <th><font color="#ffffff">Stok</font></th>
                <th><font color="#ffffff">Aksi</font></th>
            </tr>
            <?php foreach ($dataProduk as $baris) { ?>
            <tr align="center">
                <td><?php echo $baris['id']; ?></td>
                <td align="left"><?php echo $baris['nama']; ?></td>
                <td><?php echo $baris['harga']; ?></td>
                <td><?php echo $baris['stok']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $baris['id']; ?>"><font color="#2980b9">Edit</font></a> |
                    <a href="index.php?hapus=<?php echo $baris['id']; ?>"><font color="#c0392b">Hapus</font></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </center>

</body>
</html>