<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password dan konfirmasi password sama
    if ($password !== $confirm_password) {
        echo "<script>alert('Kata sandi dan konfirmasi kata sandi tidak cocok!'); window.location='daftar.php';</script>";
        exit;
    }

    // Cek apakah email sudah terdaftar sebelumnya
    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar! Silakan gunakan email lain.'); window.location='daftar.php';</script>";
        exit;
    }

    // Enkripsi password agar aman
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database (pastikan struktur kolom tabel sesuai)
    $query = "INSERT INTO users (nama, email, nomor_hp, password) VALUES ('$nama', '$email', '$nomor_hp', '$password_hashed')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan masuk.'); window.location='masuk.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, coba lagi.'); window.location='daftar.php';</script>";
    }
}
?>