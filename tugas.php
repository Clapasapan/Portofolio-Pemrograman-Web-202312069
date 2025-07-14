<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f8;
            color: #333;
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            background-color:rgb(181, 119, 191);
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .submit-btn {
            background-color:rgb(207, 167, 211);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .success {
            background-color:rgb(206, 152, 213);
            border-left: 5px solidrgb(89, 57, 95);
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Buku Tamu Digital STITEK Bontang</h1>

<?php
// Inisialisasi variabel
$nama = $email = $pesan = "";
$error = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan bersihkan
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $pesan = trim($_POST["pesan"]);

    // Validasi input
    if (empty($nama) || empty($email) || empty($pesan)) {
        $error = "Semua kolom harus diisi.";
    } else {
        // Bersihkan input untuk keamanan XSS
        $nama = htmlspecialchars($nama);
        $email = htmlspecialchars($email);
        $pesan = htmlspecialchars($pesan);
        $success = true;
    }
}
?>

<form method="post" action="">
    <label for="nama">Nama Lengkap:</label>
    <input type="text" name="nama" id="nama" value="<?= $nama ?>">

    <label for="email">Alamat Email:</label>
    <input type="email" name="email" id="email" value="<?= $email ?>">

    <label for="pesan">Pesan/Komentar:</label>
    <textarea name="pesan" id="pesan" rows="5"><?= $pesan ?></textarea>

    <button type="submit" class="submit-btn">Kirim Pesan</button>

    <?php if (!empty($error)) : ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
</form>

<?php if ($success) : ?>
    <div class="success">
        <h3>Pesan Berhasil Dikirim</h3>
        <p><strong>Nama:</strong> <?= $nama ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Pesan:</strong> <?= nl2br($pesan) ?></p>
    </div>
<?php endif; ?>

</body>
</html>
