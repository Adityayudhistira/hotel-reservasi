<?php
include '../lib/koneksi.php'; // koneksi pakai PDO

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'admin';

    try {
        $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        header("Location: login.php?register=success");
        exit();
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger text-center'>Gagal daftar: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">
        <h3 class="text-center mb-3">Buat Akun Baru</h3>

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
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="register" class="btn btn-success w-100">Daftar</button>
        </form>

        <div class="text-center mt-3">
            <small>Sudah punya akun? <a href="login.php">Login di sini</a></small>
        </div>
    </div>
</body>

</html>