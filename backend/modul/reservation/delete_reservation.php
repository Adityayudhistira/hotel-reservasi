<?php
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM reservations WHERE id = :id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header('Location: ?page=reservations');
    exit;
} else {
    echo "Gagal menghapus data reservasi.";
}
