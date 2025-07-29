<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php"; // koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username         = $_POST['username'];
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password dan konfirmasi sama
    if ($password !== $confirm_password) {
        echo "Password dan konfirmasi tidak cocok!";
        exit();
    }

    // Cek apakah email sudah digunakan
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "Email sudah terdaftar.";
        exit();
    }

    // Insert data ke database
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo "Pendaftaran berhasil!";
        header("Location: login.html"); // aktifkan jika ingin langsung ke halaman login
    } else {
        echo "Pendaftaran gagal: " . mysqli_error($conn);
    }
}
?>
