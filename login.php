<?php
session_start();
include 'lib/koneksi.php'; // koneksi pakai PDO

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Cek user berdasarkan email
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifikasi password
            if (password_verify($password, $data['password'])) {
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['role'] = $data['role'];

                // Redirect sesuai role
                if ($data['role'] === 'admin') {
                    header('Location: modul/index.php');
                } else {
                    header('Location: index.php');
                }
                exit();
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Email tidak ditemukan!";
        }
    } catch (PDOException $e) {
        $error = "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Reservasi Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">
        <h3 class="text-center mb-3">Login Akun</h3>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Nama Lengkap:</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <small>Belum punya akun? <a href="register.php">Daftar</a></small>
        </div>
    </div>
</body>

</html>