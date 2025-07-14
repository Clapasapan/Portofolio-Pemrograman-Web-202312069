<?php
// koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            padding: 8px;
            border: 1px solid #333;
        }
    </style>
</head>
<body>

    <h2>Daftar Produk Toko</h2>
    <a href="tambah.php">Tambah Produk Baru</a><br><br>

    <table>
        <tr>
            <th>id</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM produk");

        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['harga'] . "</td>";
                echo "<td>" . $data['stock'] . "</td>";
                echo "<td>
                <a href=\"edit.php?id={$data['id']}\">Edit</a> |
                <a href=\"hapus.php?id={$data['id']}\" onclick=\"return confirm('Yakin ingin hapus?');\">Hapus</a>
              </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada data produk.</td></tr>";
        }
        ?>

    </table>

</body>
</html>
