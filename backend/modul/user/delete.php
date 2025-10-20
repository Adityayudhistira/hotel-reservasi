<?php
$id = $_GET['user_id'];
$b = $conn->prepare("DELETE FROM users WHERE user_id = '$id'");
if ($b->execute()) {
    header('location:?page=user');
}
