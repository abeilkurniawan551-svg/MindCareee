<?php
// Mengambil langsung dari Environment Variables Railway yang baru saja kita lihat di gambar
$host = getenv('MYSQL_HOST') ?: getenv('MYSQLHOST');
$user = getenv('MYSQL_USER') ?: getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQL_ROOT_PASSWORD') ?: getenv('MYSQLPASSWORD');
$db   = getenv('MYSQL_DATABASE') ?: getenv('MYSQLDATABASE');
$port = getenv('MYSQL_PORT') ?: getenv('MYSQLPORT') ?: '3306';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>