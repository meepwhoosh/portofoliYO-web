<!-- <?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 🔒 PENTING: Hash password sebelum disimpan! Jangan pernah simpan password sebagai plain text.
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Gunakan prepared statements untuk mencegah SQL Injection
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $email, $hashed_password);

    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman login
        header("Location: login.html?status=signup_success");
        exit();
    } else {
        // Jika gagal (misal: email sudah ada)
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?> -->