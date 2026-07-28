<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek konfirmasi password
    if ($password !== $confirm_password) {
        echo "<script>alert('Konfirmasi password tidak cocok!'); window.location='daftar.php';</script>";
        exit;
    }

    // Cek apakah email sudah terdaftar
    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar! Gunakan email lain.'); window.location='daftar.php';</script>";
        exit;
    }

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $query = "INSERT INTO users (nama, email, nomor_hp, password) VALUES ('$nama', '$email', '$nomor_hp', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi Berhasil! Silakan Masuk.'); window.location='masuk.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "'); window.location='daftar.php';</script>";
    }
}
?>