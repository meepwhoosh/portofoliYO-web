<?php
// login.php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil data user berdasarkan email
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();

        // Verifikasi password yang diinput dengan hash di database
        if (password_verify($password, $hashed_password)) {
            // Jika password cocok, simpan data user di session
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;

            // Redirect ke halaman utama (explore)
            header("Location: index.php"); // Ganti nama index.html ke index.php
            exit();
        } else {
            // Jika password salah
            header("Location: login-site.php?error=wrong_password");
            exit();
        }
    } else {
        // Jika email tidak ditemukan
        header("Location: login-site.php?error=no_user");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>