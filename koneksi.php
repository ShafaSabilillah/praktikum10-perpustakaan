<!-- 
Nama    : Shafa Sabilillah
NIM     : 250302094
Kelas   : TI-2C
-->

<?php
// Pengaturan koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan";

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengatur karakter
mysqli_set_charset($koneksi, "utf8mb4");