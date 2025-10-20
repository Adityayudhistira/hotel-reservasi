<div class="mt-4 ms-3 me-3">
    <h2 class="mb-4 fw-bold text-dark">Kelola Pengguna</h2>
    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-light">
                <?php
                $no = 1;
                $sqlOut = $conn->prepare("SELECT * FROM users ORDER BY user_id DESC");
                $sqlOut->execute();
                foreach ($sqlOut as $row) {
                    // Warna badge berdasarkan role
                    $role = strtolower($row['role']);
                    $badgeClass = ($role == 'admin') ? 'bg-primary' : (($role == 'user') ? 'bg-warning text-dark' : 'bg-secondary');
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <span class="badge <?= $badgeClass ?> px-3 py-2">
                                <?= ucfirst($row['role']) ?>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="?page=deleteuser&user_id=<?= $row['user_id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus pengguna ini?');">
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