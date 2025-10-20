<?php
include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Hotel | Reservasi Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "modul/navbar.php";
    include "modul/banner.php";
    ?>




    <!-- 🌟 FITUR HOTEL -->
    <section id="fitur" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Fasilitas Unggulan Kami</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm py-4">
                        <div class="card-body">
                            <i class="bi bi-wifi fs-1 text-warning mb-3"></i>
                            <h5 class="fw-semibold">Wi-Fi Cepat</h5>
                            <p class="text-muted small">Koneksi internet super cepat di seluruh area hotel.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm py-4">
                        <div class="card-body">
                            <i class="bi bi-cup-hot fs-1 text-warning mb-3"></i>
                            <h5 class="fw-semibold">Restoran Eksklusif</h5>
                            <p class="text-muted small">Nikmati hidangan lezat dari chef profesional kami.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm py-4">
                        <div class="card-body">
                            <i class="bi bi-water fs-1 text-warning mb-3"></i>
                            <h5 class="fw-semibold">Kolam Renang</h5>
                            <p class="text-muted small">Bersantai di kolam renang outdoor yang tenang dan bersih.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm py-4">
                        <div class="card-body">
                            <i class="bi bi-person-badge fs-1 text-warning mb-3"></i>
                            <h5 class="fw-semibold">Pelayanan 24 Jam</h5>
                            <p class="text-muted small">Staf kami siap membantu Anda kapan pun dibutuhkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🛏️ PILIHAN KAMAR -->
    <?php
    include 'modul/kamar.php';
    ?>

    <!-- 💬 TESTIMONI -->
    <section id="testimoni" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Apa Kata Tamu Kami</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4">
                        <p class="text-muted fst-italic">"Pelayanannya luar biasa, kamarnya bersih banget dan staff-nya ramah!"</p>
                        <h6 class="fw-bold mt-3 mb-0 text-warning">– Sarah P.</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4">
                        <p class="text-muted fst-italic">"View dari kamar suite luar biasa, cocok buat staycation bareng pasangan."</p>
                        <h6 class="fw-bold mt-3 mb-0 text-warning">– Andi R.</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4">
                        <p class="text-muted fst-italic">"View dari kamar suite luar biasa, cocok buat staycation bareng pasangan."</p>
                        <h6 class="fw-bold mt-3 mb-0 text-warning">– Andi R.</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🏨 TENTANG -->
    <section id="tentang" class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Tentang Hotel Regalia</h2>
            <p class="text-muted mx-auto" style="max-width: 700px;">
                Hotel Regalia berdiri sejak 2010 dan dikenal dengan desain interior modern serta suasana elegan.
                Kami berkomitmen memberikan kenyamanan dan pelayanan terbaik bagi setiap tamu.
            </p>
        </div>
    </section>

    <!-- ✅ Footer -->
    <?php
    include 'modul/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>