<?php
$host = "localhost";
$user = "root";
$password = ""; // kosong jika default XAMPP
$database = "dbacc";
$port = "3307"; // tambahkan jika MySQL kamu di port 3307

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
