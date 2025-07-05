<?php
// db_connect.php

$servername = "localhost";
$username = "root"; // Username default XAMPP
$password = "";     // Password default XAMPP
$dbname = "portofoliyo"; // Nama database yang kita buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Memulai session untuk login
session_start();
?>