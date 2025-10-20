  <!-- ✅ Navbar Elegan Hotel Regalia -->
  <nav class="navbar navbar-dark bg-transparent position-absolute top-0 start-0 w-100 py-3 shadow-none"
    style="backdrop-filter: blur(8px); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container d-flex justify-content-between align-items-center">

      <!-- 🏨 Logo + Nama -->
      <a class="navbar-brand d-flex align-items-center fw-bold text-uppercase fs-5 text-white" href="#">
        <img src="aset/img/logo.png" alt="Logo Hotel" width="50" height="50"
          class="me-2 rounded-circle border border-2 border-light">
        <span style="letter-spacing: 1px;">Hotel Regalia</span>
      </a>

      <!-- 🌐 Menu Navigasi -->
      <ul class="navbar-nav d-flex flex-row gap-4 mb-0">
        <li class="nav-item"><a class="nav-link text-white fw-medium" href="#home">Beranda</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-medium" href="#kamar">Kamar</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-medium" href="#tentang">Tentang</a></li>
      </ul>

      <!-- 🎯 Tombol Aksi -->
      <div class="d-flex align-items-center">
        <a href="create_reservation.php?room_id=<?= $row['room_id']; ?>"
          class="btn btn-sm px-4 me-3 rounded-pill fw-semibold"
          style="background-color: #c9a856; color: #fff; transition: 0.3s;">
          Reservasi
        </a>

        <a href="login.php"
          class="btn btn-sm px-4 me-3 rounded-pill fw-semibold"
          style="background-color: #c9a856; color: #fff; transition: 0.3s;">
          Login
        </a>
      </div>

    </div>
  </nav>

  <!-- 💅 Efek Hover -->
  <style>
    .nav-link:hover {
      color: #c9a856 !important;
      transition: 0.3s;
    }

    .btn:hover {
      background-color: #b8963f !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(201, 168, 86, 0.4);
    }

    a.text-white-50:hover {
      color: #fff !important;
    }
  </style>