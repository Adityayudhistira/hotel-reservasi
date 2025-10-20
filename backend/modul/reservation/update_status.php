<?php
$id = $_GET['id'];
$status = $_GET['status'];

$stmt = $conn->prepare("UPDATE reservations SET status = :status WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':status', $status);

if ($stmt->execute()) {
    header('Location: ?page=reservations');
    exit;
} else {
    echo "Gagal memperbarui status reservasi.";
}
