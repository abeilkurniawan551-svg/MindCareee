<?php
$host = "sql113.infinityfree.com"; // Sesuaikan Host MySQL lo
$user = "if0_42515094";         // Sesuaikan User MySQL lo
$pass = "Abiel3108";     // Masukkan password akun InfinityFree lo
$db   = "if0_42515094_db_mindcare"; // Sesuaikan Nama Database lo

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>