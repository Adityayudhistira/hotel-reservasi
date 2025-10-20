<div class="table-responsive mt-4 ms-3 me-3 rounded">
    <table class="table table-striped table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = $conn->prepare("
                SELECT 
                    r.*, 
                    u.name AS user_name, 
                    rm.room_number, 
                    rm.type 
                FROM reservations r
                JOIN users u ON r.user_id = u.user_id
                JOIN rooms rm ON r.room_id = rm.room_id
                ORDER BY r.id DESC
            ");
            $sql->execute();

            foreach ($sql as $row) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                    <td><?= htmlspecialchars($row['room_number']) ?> - <?= htmlspecialchars($row['type']) ?></td>
                    <td><?= htmlspecialchars($row['check_in']) ?></td>
                    <td><?= htmlspecialchars($row['check_out']) ?></td>
                    <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                    <td>
                        <span class="badge bg-<?= $row['status'] == 'confirmed' ? 'success' : ($row['status'] == 'cancelled' ? 'danger' : 'warning') ?>">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    </td>
                    <td>
                        <a href="?page=updatestatus&id=<?= $row['id'] ?>&status=confirmed" class="btn btn-success btn-sm">Confirm</a>
                        <a href="?page=updatestatus&id=<?= $row['id'] ?>&status=cancelled" class="btn btn-warning btn-sm text-dark">Cancel</a>
                        <a href="?page=deletereservation&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>