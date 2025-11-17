<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {

    $nama       = $_POST['nama'];
    $kategori   = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok       = $_POST['stok'];

    // upload gambar
    $gambar = null;
    if ($_FILES['file_gambar']['error'] == 0) {
        $filename = time() . "_" . str_replace(' ', '_', $_FILES['file_gambar']['name']);
        $path = "gambar/" . $filename;

        move_uploaded_file($_FILES['file_gambar']['tmp_name'], $path);

        $gambar = $path;
    }

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tambah Barang</title>

<style>
    body {
        font-family: Arial;
        background: #f4f4f4;
    }
    .container {
        width: 500px;
        padding: 20px;
        margin: 50px auto;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 10px #ccc;
    }
    input, select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
    }
    .submit input {
        background: #28a745;
        color: white;
        border: none;
        margin-top: 15px;
        cursor: pointer;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Tambah Barang</h2>

    <form method="post" action="tambah.php" enctype="multipart/form-data">

        <label>Nama Barang</label>
        <input type="text" name="nama">

        <label>Kategori</label>
        <select name="kategori">
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>

        <label>Harga Jual</label>
        <input type="text" name="harga_jual">

        <label>Harga Beli</label>
        <input type="text" name="harga_beli">

        <label>Stok</label>
        <input type="text" name="stok">

        <label>Gambar</label>
        <input type="file" name="file_gambar">

        <div class="submit">
            <input type="submit" name="submit" value="Simpan">
        </div>
        
         <a href="index.php" class="btn btn-add">kembali</a>

    </form>
</div>

</body>
</html>
