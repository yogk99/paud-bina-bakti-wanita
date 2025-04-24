<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PAUD BINA BAKTI WANITA</title>
  <link rel="icon" href="{{ asset('favicon-paud.ico') }}" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #f9fafc;
        color: #333;
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
    .hero-logo {
        height: 100px;
        width: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgb(255, 255, 255);
        box-shadow: 0 0 20px rgba(34, 86, 170, 0.52);
        background-color: #fff;
        transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
    }

    .hero-logo:hover {
        transform: rotate(360deg);
        box-shadow: 0 0 30px rgba(59, 130, 246, 0.6), 0 0 60px rgba(59, 130, 246, 0.3);
    }

    @media (prefers-color-scheme: dark) {
    .hero-logo {
        border-color:rgb(255, 255, 255);
        background-color:rgb(255, 255, 255);
        box-shadow: 0 0 20px rgba(147, 197, 253, 0.2);
        }       
    .hero-logo:hover {
        box-shadow: 0 0 40px rgba(147, 197, 253, 0.5), 0 0 80px rgba(147, 197, 253, 0.2);
        }
    }



    .hero {
        background: linear-gradient(to right, #3b82f6, #60a5fa);
        color: white;
        text-align: center;
        padding: 120px 20px;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: 700;
    }

    .hero p {
        font-size: 1.2rem;
        margin-top: 10px;
    }

    .btn-hero {
        background-color: #fff;
        color: #3b82f6;
        padding: 12px 30px;
        font-weight: bold;
        border-radius: 30px;
        border: none;
        margin-top: 20px;
        transition: all 0.3s ease;
    }

    .btn-hero:hover {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .features {
        padding: 80px 20px;
        background-color: #f1f5f9;
    }

    .feature-icon {
        font-size: 48px;
        color: #3b82f6;
        margin-bottom: 20px;
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
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo_paud.png') }}" alt="Logo">
                <span class="fw-bold text-primary">PAUD BINA BAKTI WANITA</span>
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tentang') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="hero">
        <div class="container" data-aos="fade-up">
            <img src="{{ asset('images/logo_paud.png') }}" alt="Logo PAUD" class="hero-logo mb-4">
            <h1>PAUD BINA BAKTI WANITA</h1>
            <p>Berakhlaq Mulia, Sehat, Cerdas, Ceria Dan Mandiri</p>
            <a href="{{ url('/login') }}" class="btn btn-hero">Masuk Dashboard</a>
        </div>
    </section>

    <section class="features text-center">
        <div class="container">
            <h2 class="mb-5 text-primary fw-bold" data-aos="fade-up">Fitur Kami</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="p-4 bg-white shadow-sm rounded-4 h-100">
                        <div class="feature-icon">🎨</div>
                        <h5>Kreativitas</h5>
                        <p>Kegiatan seni dan prakarya yang merangsang imajinasi anak.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="p-4 bg-white shadow-sm rounded-4 h-100">
                        <div class="feature-icon">📚</div>
                        <h5>Pendidikan Holistik</h5>
                        <p>Pembelajaran yang menyeimbangkan aspek kognitif, sosial, dan emosional.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="p-4 bg-white shadow-sm rounded-4 h-100">
                        <div class="feature-icon">👩‍🏫</div>
                        <h5>Guru Profesional</h5>
                        <p>Tenaga pendidik berpengalaman dan penuh kasih sayang.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2025 PAUD BINA BAKTI WANITA | Di Buat Oleh: <a href="#">@adib_sinatra16</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
