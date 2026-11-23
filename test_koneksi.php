<!-- 
Nama    : Shafa Sabilillah
NIM     : 250302094
Kelas   : TI-2C
-->

<?php
require_once "koneksi.php";

echo "Koneksi ke MySQL berhasil!<br>";
echo "Host: " . $host . "<br>";
echo "Database: " . $database . "<br>";
echo "Versi Server: " . mysqli_get_server_info($koneksi);