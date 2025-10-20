<?php
if (isset($_GET['room_id']) && isset($_GET['status'])) {
    $room_id = $_GET['room_id'];
    $status = $_GET['status'];

    $stmt = $conn->prepare("UPDATE rooms SET status = :status WHERE room_id = :room_id");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':room_id', $room_id);

    if ($stmt->execute()) {
        header('Location:?page=room');
        exit;
    } else {
        echo "Gagal mengubah status kamar.";
    }
}
