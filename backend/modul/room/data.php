<div class="mt-4 ms-3 me-3">
    <h2 class="mb-4 fw-bold text-dark">Kelola Kamar</h2>
    <a href="?page=addroom" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Kamar
    </a>

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nomor</th>
                    <th>Gambar</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-light">
                <?php
                $no = 1;
                $sqlOut = $conn->prepare("SELECT * FROM rooms ORDER BY room_id DESC");
                $sqlOut->execute();
                foreach ($sqlOut as $row) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['room_number']) ?></td>
                        <td>
                            <img src="../gbrroom/<?= htmlspecialchars($row['image']) ?>"
                                alt="Gambar Kamar"
                                class="img-thumbnail"
                                style="width: 80px; height: 60px; object-fit: cover;">
                        </td>
                        <td><?= htmlspecialchars($row['type']) ?></td>
                        <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                        <td style="max-width: 250px;"><?= htmlspecialchars($row['description']) ?></td>
                        <td>
                            <?php
                            $status = strtolower($row['status']);
                            $badgeClass = $status == 'tersedia' ? 'bg-success' : ($status == 'tidak tersedia' ? 'bg-warning text-dark' : 'bg-secondary');
                            ?>
                            <span class="badge <?= $badgeClass ?> px-3 py-2">
                                <?= ucfirst($status) ?>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="?page=editstatus&room_id=<?= $row['room_id'] ?>&status=tersedia"
                                    class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i> Tersedia
                                </a>
                                <a href="?page=editstatus&room_id=<?= $row['room_id'] ?>&status=tidak tersedia"
                                    class="btn btn-warning btn-sm text-dark">
                                    <i class="fas fa-times"></i> Tidak
                                </a>
                                <a href="?page=delete&room_id=<?= $row['room_id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus kamar ini?');">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>