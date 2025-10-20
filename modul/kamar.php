<style>
    .card-img-top {
        width: 100%;
        height: 250px;
        /* atur tinggi sesuai kebutuhan, misalnya 250px */
        object-fit: cover;
        /* biar gambar nggak ketarik tapi dipotong rapi */
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
</style>


<section id="kamar" class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Pilihan Kamar</h2>
        <div class="row g-4">
            <?php
            // Ambil data kamar dari database (pakai PDO)
            $sql = $conn->prepare("SELECT * FROM rooms ORDER BY room_id DESC");
            $sql->execute();
            $rooms = $sql->fetchAll(PDO::FETCH_ASSOC); // ✅ ambil semua data sebagai array

            foreach ($rooms as $row):
            ?>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="gbrroom/<?= htmlspecialchars($row['image']); ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($row['room_number']); ?>">

                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($row['type']); ?></h5>
                            <p>
                                <?php if (strtolower($row['status']) == 'tersedia'): ?>
                                    <span class="badge bg-success">Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Tidak Tersedia</span>
                                <?php endif; ?>
                            </p>

                            <p class="text-muted small"><?= htmlspecialchars($row['description']); ?></p>
                            <p class="fw-semibold">Rp <?= number_format($row['price'], 0, ',', '.'); ?> / malam</p>

                            <!-- Tombol reservasi dinamis -->
                            <a href="modul/create_reservation.php?room_id=<?= $row['room_id']; ?>"
                                class="btn btn-warning w-100 rounded-pill">
                                Reservasi Sekarang
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>