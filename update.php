<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];

mysqli_query($koneksi, "UPDATE produk SET nama='$nama', harga='$harga', stock='$stock' WHERE id='$id'");

header("Location: index.php");
exit();
?>