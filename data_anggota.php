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
        ORDER BY id ASC";

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
            <th>Aksi</th>
        </tr>

        <?php while ($baris = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= htmlspecialchars($baris["id"]) ?></td>
            <td><?= htmlspecialchars($baris["no_anggota"]) ?></td>
            <td><?= htmlspecialchars($baris["nama_lengkap"]) ?></td>
            <td><?= htmlspecialchars($baris["email"]) ?></td>
            <td><?= htmlspecialchars($baris["no_hp"]) ?></td>
            <td><?= htmlspecialchars($baris["jenis_anggota"]) ?></td>
            <td><?= htmlspecialchars($baris["alamat"]) ?></td>

            <td>
                <a href="edit_anggota.php?id=<?php echo (int) $baris["id"]; ?>">Edit</a>
                <form action="hapus_anggota.php" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?php echo (int) $baris["id"]; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>