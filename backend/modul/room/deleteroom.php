<?php
if (isset($_GET['room_id'])) {
    $id = $_GET['room_id'];

    $b = $conn->prepare("DELETE FROM rooms WHERE room_id = :id");
    $b->bindParam(':id', $id);

    if ($b->execute()) {
        header('Location: ?page=room');
        exit;
    } else {
        echo "Gagal menghapus data kamar.";
    }
}
