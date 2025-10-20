<section id="home"
    class="text-white text-center d-flex flex-column justify-content-center align-items-center vh-100"
    style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
         url('aset/img/banner.jpg') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3">Selamat Datang di <span class="text-danger">Hotel Regalia</span></h1>
        <p class="lead mb-4 fs-5">Nikmati pengalaman menginap mewah dan pelayanan terbaik kami.</p>
        <a href="create_reservation.php?room_id=<?= $row['room_id']; ?>" class="btn btn-danger btn-lg px-5 py-2 rounded-pill shadow">Pesan Sekarang</a>
    </div>
</section>