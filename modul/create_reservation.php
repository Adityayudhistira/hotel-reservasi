<?php
session_start();
include '../lib/koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../backend/login.php');
    exit;
}

// ✅ Ambil data kamar berdasarkan room_id dari URL
if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];

    $stmt = $conn->prepare("SELECT * FROM rooms WHERE room_id = :id");
    $stmt->bindParam(':id', $room_id);
    $stmt->execute();
    $room = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$room) {
        echo "<p>Kamar tidak ditemukan.</p>";
        exit;
    }
} else {
    echo "<p>ID kamar tidak ditemukan.</p>";
    exit;
}

// ✅ Proses simpan reservasi
if (isset($_POST['btn'])) {
    $user_id   = $_SESSION['user_id'];
    $check_in  = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $status    = 'pending';
    $total_price = $room['price']; // ambil dari data kamar

    $stmt = $conn->prepare("INSERT INTO reservations (user_id, room_id, check_in, check_out, total_price, status)
                            VALUES (:user_id, :room_id, :check_in, :check_out, :total_price, :status)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':room_id', $room_id);
    $stmt->bindParam(':check_in', $check_in);
    $stmt->bindParam(':check_out', $check_out);
    $stmt->bindParam(':total_price', $total_price);
    $stmt->bindParam(':status', $status);

    if ($stmt->execute()) {
        header('Location: ../index.php');
        exit;
    } else {
        echo "<p>❌ Gagal menambahkan reservasi.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            padding: 50px;
        }

        .container {
            background: white;
            max-width: 550px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #ffc107;
            border: none;
        }

        button:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center mb-4">Reservasi Kamar</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nomor Kamar</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($room['room_number'] ?? '-') ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Kamar</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($room['type'] ?? '-') ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga per Malam</label>
                <input type="text" class="form-control" value="Rp <?= number_format($room['price'], 0, ',', '.') ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Check-in</label>
                <input type="date" name="check_in" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Check-out</label>
                <input type="date" name="check_out" class="form-control" required>
            </div>

            <button type="submit" name="btn" class="btn btn-warning w-100">Reservasi Sekarang</button>
        </form>
    </div>
</body>

</html>