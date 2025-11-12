<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online | SMK Antartika</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            scroll-behavior: smooth;
        }
        .navbar {
            background-color: #0d6efd;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .navbar .nav-link {
            color: white !important;
            font-weight: 500;
            margin-right: 10px;
            transition: 0.3s;
        }
        .navbar .nav-link:hover {
            color: #ffc107 !important;
        }
        .btn-login {
            background: linear-gradient(90deg, #ffffff, #e9ecef);
            color: #0d6efd;
            border-radius: 30px;
            font-weight: 600;
            padding: 8px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease-in-out;
        }
        .btn-login:hover {
            background-color: #ffc107;
            transform: scale(1.05);
        }

        /* Hero sekarang menggunakan background gambar dengan overlay gelap
           Letakkan file gambar di: public/images/hero.jpg (atau ubah path di bawah) */
        .hero {
            position: relative;
            color: white;
            padding: 120px 0;
            text-align: center;
            background-image: url('images/sekolah.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            min-height: 380px;
            display: flex;
            align-items: center;
        }

        /* overlay untuk meningkatkan kontras teks */
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.25));
            z-index: 0;
        }

        /* pastikan konten berada di atas overlay */
        .hero .container {
            position: relative;
            z-index: 1;
        }
        .hero h1 {
            font-weight: 700;
            font-size: 2.8rem;
        }
        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }
        .section-title {
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 40px;
        }
        .timeline-step {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .timeline-step:hover {
            transform: translateY(-5px);
        }
        .timeline-icon {
            font-size: 40px;
            color: #0d6efd;
            margin-bottom: 15px;
        }
        .accordion-button {
            font-weight: 600;
            color: #0d6efd;
        }
        .accordion-button:not(.collapsed) {
            background-color: #e7f0ff;
            color: #0d6efd;
        }
        footer {
            background: #0d6efd;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }
        footer a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">SMK ANTARTIKA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jurusan">Jurusan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pendaftaran">Tata Cara</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-login" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section id="beranda" class="hero">
        <div class="container">
            <h1>Selamat Datang di PPDB Online SMK Antartika</h1>
            <p>Daftar Sekarang dan Wujudkan Impianmu Bersama Kami</p>
            <div class="mt-4">
                <a href="{{ route('register') }}" class="btn btn-light btn-lg me-3">Daftar Sekarang</a>
                <a href="#pendaftaran" class="btn btn-outline-light btn-lg">Lihat Tata Cara</a>
            </div>
        </div>
    </section>

    {{-- Jurusan --}}
    <section id="jurusan" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title">Jurusan Kami</h2>
            <div class="row g-4">
                @php
                    $jurusan = [
                        ['RPL', 'Rekayasa Perangkat Lunak', 'bi bi-laptop'],
                        ['TKR', 'Teknik Kendaraan Ringan', 'bi bi-truck'],
                        ['TPM', 'Teknik Pemesinan', 'bi bi-gear'],
                        ['TITL', 'Teknik Instalasi Tenaga Listrik', 'bi bi-lightning-charge'],
                        ['TEI', 'Teknik Elektronika Industri', 'bi bi-cpu'],
                    ];
                @endphp
                @foreach($jurusan as $j)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body text-center">
                                <i class="{{ $j[2] }} display-4 text-primary mb-3"></i>
                                <h5 class="fw-bold">{{ $j[1] }}</h5>
                                <p class="text-muted">Jurusan {{ $j[0] }} membekali siswa dengan kemampuan unggul di bidangnya.</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tata Cara Pendaftaran --}}
    <section id="pendaftaran" class="py-5">
        <div class="container text-center">
            <h2 class="section-title">Tata Cara Pendaftaran</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-3">
                    <div class="timeline-step">
                        <i class="bi bi-person-plus timeline-icon"></i>
                        <h5 class="fw-bold">1. Buat Akun</h5>
                        <p class="text-muted">Klik <strong>Daftar</strong> untuk membuat akun PPDB.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="timeline-step">
                        <i class="bi bi-file-earmark-text timeline-icon"></i>
                        <h5 class="fw-bold">2. Isi Formulir</h5>
                        <p class="text-muted">Isi data pribadi dan sekolah asal dengan benar.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="timeline-step">
                        <i class="bi bi-upload timeline-icon"></i>
                        <h5 class="fw-bold">3. Upload Dokumen</h5>
                        <p class="text-muted">Unggah rapor, akta kelahiran, dan dokumen lain.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="timeline-step">
                        <i class="bi bi-check-circle timeline-icon"></i>
                        <h5 class="fw-bold">4. Verifikasi & Selesai</h5>
                        <p class="text-muted">Tunggu verifikasi admin. Jika disetujui, kamu resmi terdaftar!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="py-5 bg-white">
        <div class="container">
            <h2 class="section-title text-center">Pertanyaan Umum (FAQ)</h2>
            <div class="accordion mt-4" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                            Bagaimana cara mendaftar PPDB Online?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Klik tombol <strong>“Daftar Sekarang”</strong> di halaman utama, lalu isi data diri kamu sesuai petunjuk sistem.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                            Apakah saya bisa mendaftar lewat HP?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Bisa! Website PPDB ini sudah mendukung tampilan mobile, kamu bisa daftar lewat HP dengan mudah.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                            Bagaimana kalau lupa password akun?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Klik <strong>“Lupa Password”</strong> di halaman login, lalu ikuti langkah reset melalui email kamu.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section id="tentang" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title">Tentang Sekolah</h2>
            <p class="lead text-muted">SMK Antartika berkomitmen mencetak generasi unggul dan siap kerja dengan fasilitas modern dan pengajar berpengalaman.</p>
        </div>
    </section>

    {{-- Kontak --}}
    <section id="kontak" class="py-5">
        <div class="container text-center">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="lead">📍 Jl. Raya Siwalanpanji 61252, Buduran, Sidoarjo<br>
                📞 (031) 8962851 | ✉️ smks.antartika1.sda@gmail.com</p>
            <div class="mt-3">
                <a href="#" class="btn btn-outline-light"><i class="bi bi-facebook"></i></a>
                <a href="#" class="btn btn-outline-light"><i class="bi bi-twitter"></i></a>
                <a href="#" class="btn btn-outline-light"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} SMK Antartika | PPDB Online</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
