<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {
    // Simpan data penting ke session
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $user['nama']; // <-- INI YANG PALING PENTING
    $_SESSION['email'] = $user['email'];

    // Lempar ke halaman dashboard
    header("Location: dashboard.php");
    exit;
} else {
    echo "Login gagal! Email atau password salah.";
}
?>