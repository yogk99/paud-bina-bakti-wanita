<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tentang Kami - PAUD Bina Bakti Wanita</title>
  <link rel="icon" href="{{ asset('favicon-paud.ico') }}" type="image/x-icon">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
  <!-- AOS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
    }

    .navbar {
      background-color: white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand img {
      height: 40px;
      margin-right: 10px;
    }

    .nav-link {
      color: #0d6efd !important;
      font-weight: 600;
    }

    .section-title {
      font-weight: 700;
      color: #3b82f6;
    }

    .content-section {
      padding: 60px 20px;
    }

    .icon {
      font-size: 36px;
      color: #3b82f6;
    }

    .footer {
      background-color: #e2e8f0;
      text-align: center;
      padding: 30px 20px;
      color: #475569;
    }
  </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo_paud.png') }}" alt="Logo">
                <span class="fw-bold text-primary">PAUD BINA BAKTI WANITA</span>
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>               
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="content-section text-center">
        <div class="container" data-aos="fade-up">
            <img src="{{ asset('images/logo_paud.png') }}" alt="Logo" style="height: 100px;" class="rounded-circle mb-4 shadow-sm">
            <h2 class="section-title mb-4">Tentang Kami</h2>
            <p class="lead">PAUD BINA BAKTI WANITA adalah lembaga pendidikan anak usia dini yang berkomitmen untuk menumbuhkan generasi yang ceria, cerdas, dan penuh kasih.</p>
        </div>
    </section>

    <section class="content-section bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mb-4" data-aos="zoom-in">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <div class="icon mb-3">🌟</div>
                        <h4 class="text-primary fw-bold">Visi</h4>
                        <p>Mewujudkan Anak Usia Dini Yang Berakhlaq Mulia, Sehat, Cerdas, Ceria, Dan Mandiri</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <div class="icon mb-3">🎯</div>
                        <h4 class="text-primary fw-bold">Misi</h4>
                        <ul class="list-unstyled">
                            <li>✔️ Mensosialisasikan tentang pentingnya pendidikan usia dini pada orang tua dan masyarakat.</li>
                            <li>✔️ Senantiasa memberikan pelayanan yang berpusat pada kebutuhan anak.</li>
                            <li>✔️ Meningkatkan mutu pendidik melalui pelatihan-pelatihan diklat.</li>
                            <li>✔️ Menanamkan pendidikan moral, nilai-nilai agama dan mengembangkan seni budaya sejak usia dini.</li>
                            <li>✔️ Meningkatkan kerja sama dengan pihak terkait, pemerhati paud, serta tokoh masyarakat.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="container text-center" data-aos="fade-up">
            <h3 class="section-title mb-4">Nilai-Nilai Kami</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-3 bg-white rounded-4 shadow-sm h-100">
                        <div class="icon mb-2">💖</div>
                        <h5>Kasih Sayang</h5>
                        <p>Kami mendidik dengan cinta dan kepedulian.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-white rounded-4 shadow-sm h-100">
                        <div class="icon mb-2">🧠</div>
                        <h5>Kreativitas</h5>
                        <p>Kami mendorong eksplorasi dan imajinasi anak-anak.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-white rounded-4 shadow-sm h-100">
                        <div class="icon mb-2">🤝</div>
                        <h5>Kebersamaan</h5>
                        <p>Kami menumbuhkan sikap saling menghormati dan kerja sama.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section bg-light">
        <div class="container text-center" data-aos="fade-up">
            <h3 class="section-title mb-4">Galeri Kegiatan</h3>
            <p class="mb-5">Beberapa momen kebersamaan di PAUD BINA BAKTI WANITA 📷</p>
            <div class="row g-4">
            @for ($i = 1; $i <= 6; $i++)
                <div class="col-6 col-md-4">
                    <div class="rounded-4 overflow-hidden shadow-sm">
                        <img src="{{ asset('images/galeri/galeri' . $i . '.jpg') }}" alt="Galeri {{ $i }}" class="img-fluid" style="object-fit: cover; height: 200px; width: 100%;">
                    </div>
                </div>
             @endfor
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2025 PAUD Bina Bakti Wanita | <a href="#">Kontak Kami</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
