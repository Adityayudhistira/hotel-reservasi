<?php
session_start();
error_reporting(0);
include "../lib/koneksi.php";
if (!isset($_SESSION['user_id'])) {
    include "login.php";
} else {
?>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin | Hotel Regalia</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="aset/css/style.css">
    </head>

    <body>

        <?php
        include "modul/sidebar.php"
        ?>

        <!-- Main Content -->
        <?php
        include "modul/navbar.php"
        ?>

        <?php
        $page = $_GET['page'];
        switch ($page) {
            case 'dashboard':
                include "modul/dashboard.php";
                break;

            // CRUD ROOM
            case 'room':
                include "modul/room/data.php";
                break;
            case 'addroom':
                include "modul/room/add.php";
                break;
            case 'editstatus':
                include "modul/room/editstatus.php";
                break;
            case 'deleteroom':
                include "modul/room/deleteroom.php";
                break;

            // RESERVATION
            case 'reservations':
                include "modul/reservation/reservations.php";
                break;
            case 'updatestatus':
                include "modul/reservation/update_status.php";
                break;
            case 'deletereservation':
                include "modul/reservation/delete_reservation.php";
                break;

            case 'user':
                include "modul/user/data.php";
                break;
            case 'deleteuser':
                include "modul/user/delete.php";
                break;



            case 'logout':
                include "modul/logout.php";
                break;
            default:
                break;
        }
        ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php } ?>