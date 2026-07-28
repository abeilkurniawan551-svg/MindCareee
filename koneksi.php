<?php
$host = getenv('MYSQL_HOST') ?: getenv('MYSQLHOST') ?: 'localhost';
$user = getenv('MYSQL_USER') ?: getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQL_ROOT_PASSWORD') ?: getenv('MYSQLPASSWORD') ?: '';
$db   = getenv('MYSQL_DATABASE') ?: getenv('MYSQLDATABASE') ?: 'mindcare';
$port = getenv('MYSQL_PORT') ?: getenv('MYSQLPORT') ?: '3306';

// Memakai mysqli agar tidak memunculkan error 'could not find driver' milik PDO
$conn = mysqli_connect($host, $user, $pass, $db, (int)$port);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>