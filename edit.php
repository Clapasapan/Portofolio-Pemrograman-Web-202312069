<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id");
$data = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stock'];

    $sql = "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stock' WHERE id_produk=$id";
    mysqli_query($koneksi, $sql);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Edit Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" value="<?= $data['stock'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
