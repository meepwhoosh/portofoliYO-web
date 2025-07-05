<?php
// upload.php

include 'config.php';

// Mulai session untuk akses $_SESSION
// session_start();

// Pastikan user sudah login
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('Location: login.html');
//     exit;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("User belum login.");
    }
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    
    // --- Proses Upload File ---
    $target_dir = "uploads/"; // Buat folder 'uploads' di direktori Anda
    // Pastikan folder uploads ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $file_name = basename($_FILES["file-input"]["name"][0]); // Ambil file pertama saja untuk contoh ini
    $target_file = $target_dir . time() . '_' . $file_name; // Beri nama unik agar tidak tumpang tindih
    
    // Pindahkan file dari temporary location ke folder 'uploads'
    if (move_uploaded_file($_FILES["file-input"]["tmp_name"][0], $target_file)) {
        // Jika file berhasil diupload, simpan info ke database
        $stmt = $conn->prepare("INSERT INTO works (user_id, title, description, file_url, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $user_id, $title, $description, $target_file, $category);

        if ($stmt->execute()) {
            // Handle tags (logika lebih kompleks, ini versi sederhana)
            // Anda perlu memproses input tags, memasukkannya ke tabel 'tags' jika belum ada, lalu ke 'work_tags'.
            
            header("Location: work-detail.php?id=" . $stmt->insert_id); // Redirect ke halaman detail karya yang baru dibuat
            exit();
        } else {
            echo "Error saat menyimpan ke database: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Maaf, terjadi error saat mengupload file.";
    }
    $conn->close();
}
?>