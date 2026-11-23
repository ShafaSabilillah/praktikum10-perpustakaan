<!-- 
Nama    : Shafa Sabilillah
NIM     : 250302094
Kelas   : TI-2C
-->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Anggota Perpustakaan</title>
</head>
<body>
    <h2>Form Pendaftaran Anggota Perpustakaan Kampus</h2>

    <!-- Menambahkan notifikasi berhasil -->
    <?php
    if (isset($_GET["status"]) && $_GET["status"] == "berhasil") {
        echo "<p style='color: green;'>
              Pendaftaran anggota berhasil disimpan!
            </p>";
    }
    ?>

    <form action="proses_anggota.php" method="POST">

        <label>Nomor Anggota:</label><br>
        <input type="text" name="no_anggota"
               maxlength="15" pattern="[0-9]+"
               inputmode="numeric" required>
        <br><br>

        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap"
               maxlength="100" required>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email"
               maxlength="100" required>
        <br><br>

        <label>Nomor HP:</label><br>
        <input type="text" name="no_hp"
               maxlength="13" minlength="10"
               pattern="[0-9]+" inputmode="numeric" required>
        <br><br>

        <label>Jenis Anggota:</label><br>
        <select name="jenis_anggota" required>
            <option value="">-- Pilih Jenis Anggota --</option>
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Dosen">Dosen</option>
            <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
        </select>
        <br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" rows="4" required></textarea>
        <br><br>

        <button type="submit" name="daftar">Daftar</button>
        <button type="reset">Reset</button>

    </form>

</body>
</html>