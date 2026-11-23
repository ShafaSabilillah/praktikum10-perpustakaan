<!-- 
Nama    : Shafa Sabilillah
NIM     : 250302094
Kelas   : TI-2C
-->

<?php
require_once "koneksi.php";

// Mengambil seluruh data anggota
$sql = "SELECT id, no_anggota, nama_lengkap, email,
        no_hp, jenis_anggota, alamat
        FROM anggota
        ORDER BY id DESC";

$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Gagal mengambil data: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota Perpustakaan</title>
</head>
<body>

    <h2>Data Anggota Perpustakaan</h2>

    <a href="form_anggota.php">Kembali ke Form Pendaftaran</a>

    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>No. Anggota</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Jenis Anggota</th>
            <th>Alamat</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= htmlspecialchars($row["id"]) ?></td>
            <td><?= htmlspecialchars($row["no_anggota"]) ?></td>
            <td><?= htmlspecialchars($row["nama_lengkap"]) ?></td>
            <td><?= htmlspecialchars($row["email"]) ?></td>
            <td><?= htmlspecialchars($row["no_hp"]) ?></td>
            <td><?= htmlspecialchars($row["jenis_anggota"]) ?></td>
            <td><?= htmlspecialchars($row["alamat"]) ?></td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>