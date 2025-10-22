<?php
if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];

    $b = $conn->prepare("DELETE FROM rooms WHERE room_id = :room_id");
    $b->bindParam(':room_id', $room_id);

    if ($b->execute()) {
        header('Location: ?page=room');
        exit;
    } else {
        echo "Gagal menghapus data kamar.";
    }
}
