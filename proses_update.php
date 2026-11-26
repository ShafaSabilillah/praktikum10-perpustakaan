<!-- 
Nama    : Shafa Sabilillah
NIM     : 250302094
Kelas   : TI-2C
-->

<?php
require_once "koneksi.php";

// Memastikan data dikirim menggunakan POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: data_anggota.php");
    exit;
}

// Mengambil data dari form
$no_anggota = isset($_POST["no_anggota"]) ? trim($_POST["no_anggota"]) : "";
$nama_lengkap = isset($_POST["nama_lengkap"]) ? trim($_POST["nama_lengkap"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$no_hp = isset($_POST["no_hp"]) ? trim($_POST["no_hp"]) : "";
$jenis_anggota = isset($_POST["jenis_anggota"]) ? trim($_POST["jenis_anggota"]) : "";
$alamat = isset($_POST["alamat"]) ? trim($_POST["alamat"]) : "";
$id = isset($_POST["id"]) ? (int) $_POST["id"] : 0;

// Menyiapkan tempat untuk pesan kesalahan
$errors = [];

// Validasi nomor anggota
if (empty($no_anggota)) {
    $errors[] = "Nomor anggota wajib diisi.";
} elseif (!ctype_digit($no_anggota)) {
    $errors[] = "Nomor anggota hanya boleh berisi angka.";
} elseif (strlen($no_anggota) > 15) {
    $errors[] = "Nomor anggota maksimal 15 digit.";
}

// Validasi nama lengkap
if (empty($nama_lengkap)) {
    $errors[] = "Nama lengkap wajib diisi.";
} elseif (strlen($nama_lengkap) > 100) {
    $errors[] = "Nama lengkap maksimal 100 karakter.";
}

// Validasi email
if (empty($email)) {
    $errors[] = "Email wajib diisi.";
} elseif (strlen($email) > 100) {
    $errors[] = "Email maksimal 100 karakter.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

// Validasi nomor HP
if (empty($no_hp)) {
    $errors[] = "Nomor HP wajib diisi.";
} elseif (!ctype_digit($no_hp)) {
    $errors[] = "Nomor HP hanya boleh berisi angka.";
} elseif (strlen($no_hp) < 10 || strlen($no_hp) > 13) {
    $errors[] = "Nomor HP harus terdiri dari 10 sampai 13 digit.";
}

// Validasi jenis anggota
$jenis_valid = ["Mahasiswa", "Dosen", "Tenaga Kependidikan"];

if (empty($jenis_anggota)) {
    $errors[] = "Jenis anggota wajib dipilih.";
} elseif (!in_array($jenis_anggota, $jenis_valid, true)) {
    $errors[] = "Jenis anggota tidak valid.";
}

// Validasi alamat
if (empty($alamat)) {
    $errors[] = "Alamat wajib diisi.";
}

// Jika terdapat kesalahan, tampilkan pesan
if (!empty($errors)) {
    echo "<h2>Terjadi Kesalahan!</h2>";
    echo "<ul>";

    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error, ENT_QUOTES, "UTF-8") . "</li>";
    }

    echo "</ul>";
    echo '<a href="data_anggota.php">Kembali ke Form</a>';
    exit;
}

// Menyiapkan perintah UPDATE
$sql = "UPDATE anggota SET
        no_anggota = ?,
        nama_lengkap = ?,
        email = ?,
        no_hp = ?,
        jenis_anggota = ?,
        alamat = ?
        WHERE id = ?";

$stmt = mysqli_prepare($koneksi, $sql);

// Memeriksa apakah perintah SQL berhasil disiapkan
if (!$stmt) {
    die("Gagal menyiapkan query: " .
        htmlspecialchars(mysqli_error($koneksi), ENT_QUOTES, "UTF-8"));
}

// Menghubungkan data dengan tanda tanya
mysqli_stmt_bind_param(
    $stmt,
    "ssssssi",
    $no_anggota,
    $nama_lengkap,
    $email,
    $no_hp,
    $jenis_anggota,
    $alamat,
    $id
);

// Menjalankan perintah INSERT
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    // Kembali ke form dengan status berhasil
    header("Location: data_anggota.php?status=berhasil");
    exit;
} else {
    // Menampilkan alasan jika penyimpanan gagal
    echo "<h2>Data Gagal Disimpan!</h2>";
    echo "<p>" .
        htmlspecialchars(mysqli_stmt_error($stmt), ENT_QUOTES, "UTF-8") .
        "</p>";
    echo '<a href="data_anggota.php">Kembali ke Form</a>';
}

mysqli_stmt_close($stmt);