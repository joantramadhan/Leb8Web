<?php
include 'koneksi.php';

$sql = "SELECT * FROM data_barang ORDER BY id_barang DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Data Barang</title>
<style>
    body {
        font-family: Arial;
        background: #f0f0f0;
    }
    h2 {
        text-align: center;
        margin-top: 20px;
    }
    .container {
        width: 90%;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px #ccc;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    table th {
        background: #eee;
    }
    img {
        width: 60px;
        border-radius: 5px;
    }
    .btn {
        padding: 6px 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
    }
    .btn-add { background: #28a745; }
    .btn-edit { background: #007bff; }
    .btn-del { background: #dc3545; }
</style>
</head>
<body>

<h2>DATA BARANG</h2>

<div class="container">

    <a href="tambahan.php" class="btn btn-add">+ Tambah Barang</a>

    <table>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php 
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) : 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>
                <?php if ($row["gambar"]) : ?>
                    <img src="<?= $row["gambar"]; ?>">
                <?php else : ?>
                    <span>—</span>
                <?php endif; ?>
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["kategori"]; ?></td>
            <td>Rp <?= number_format($row["harga_jual"]); ?></td>
            <td>Rp <?= number_format($row["harga_beli"]); ?></td>
            <td><?= $row["stok"]; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id_barang']; ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id_barang']; ?>" class="btn btn-del"
                   onclick="return confirm('Yakin ingin menghapus data ini?');">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>
