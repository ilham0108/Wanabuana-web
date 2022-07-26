<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Wanabuana</title>
    <meta content="Mapala Wanabuana" name="title">
    <meta content="Organisasi Mahasiswa Pecinta Alam Wanabuana, Universitas Duta Bangasa Surakarta" name="description">
    <meta content="Mapala, Mahasiswa Pecinta Alam, Wanabuana, Universitas Duta Bangsa Surakarta" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Ninestars - v4.7.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6225aafea34c24564129c490/1fthi7tci';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script> --}}
<!--End of Tawk.to Script-->

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1 class="text-light"><a href="{{ route('index') }}"><img src="{{ asset('img/hero-img.png') }}" class="rounded float-end"></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                @include('layouts.Frontend.navbar-layouts')
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Mahasiswa Pecinta Alam Wanabuana</h1>
                    <h2>Uiversitas Duta Bangsa Surakarta</h2>
                    <h2>~ Wanabuana Sejati Takut Mati ~</h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="section-title">
                    <a href="{{ route('about.index') }}">
                        <h2>About</h2>
                    </a>
                    <p>About us</p>
                </div>

                <div class="row justify-content-between">
                    <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                        <img src="{{ asset('storage/Image/General/' . $about->image) }}" class="img-fluid" alt="" data-aos="zoom-in">
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0">
                        <h3 data-aos="fade-up">Mahasiswa Pecinta Alam Wanabuana</h3>
                        <p data-aos="fade-up" data-aos-delay="100">
                            Mapala Wanabuana berada dibawah naungan Universitas Duta Bangsa Surakarta. Mapala Wanabuana
                            Memiliki 4 Divisi di dalamnya, yaitu : Divisi Emergency, Divisi Navigasi, Divisi Gunung
                            Hutan, Divisi Survival
                        </p>
                        <div class="row">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-receipt"></i>
                                <h4>Sejarah Wanabuana</h4>
                                <p>Mapala Wanabuana lahir pada tahun 1998, tepatnya pada tanggal 28 September 1998. Awal
                                    didirikan, Mapala Wanabuana berada dibawah naungan LKP Aksmi Kusuma Bangsa. <a href="#">Read more ...</a>
                                </p>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-cube-alt"></i>
                                <h4>Sejarah Universitas Duta Bangsa Surakarta</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt <a href="https://udb.ac.id/profil/sejarah">Read more
                                        ...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="post" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <a href="{{ route('post.index') }}" style="color: #c1b6b0">
                        <h2>Post</h2>
                    </a>
                    <p>our latest post</p>
                </div>
                <div class="row">
                    @foreach ($post as $item)
                        <div class=" col-md-6 col-lg-3 d-flex justify-content-center align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="card icon-box p-0" style="width: 18rem;">
                                @if ($item->image == null)
                                    <img src="{{ asset('storage/Image/Post/not_avaible.png') }}" width="100%" class="card-img-top" style="height: 15rem"
                                        alt="...">
                                @else
                                    <img src="{{ asset('storage/Image/Post/' . $item->image) }}" class="card-img-top" style="height: 15rem" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title"><strong>{{ $item->title }}</strong></h5>
                                    <p class="card-text">{{ $item->excerpt }} <a href="/post/{{ $item->slug }}"> Read more ...</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="galery" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Galery</h2>
                    <p>Check out our beautifull galery</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($galery_category as $item)
                                <li data-filter=".{{ $item->category }}">{{ $item->category }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($galery as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item {{ $item->category[0]->category }}">
                            <div class="portfolio-wrap" style="max-height: 310px">
                                <img src="{{ asset('storage/Image/Galery/' . $item->image) }}" class="img-fluid" alt="">
                                <div class="portfolio-links">
                                    <a href="{{ asset('storage/Image/Galery/' . $item->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox"
                                        title="{{ $item->category[0]->category }}"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                                <div class="portfolio-info">
                                    <h4>{{ $item->category[0]->category }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Team</h2>
                    <p>Our team is always here to help</p>
                </div>

                <div class="row" style="justify-content: center">
                    @foreach ($anggota as $anggota)
                        <div class="col-xl-2 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="member">
                                <img src="{{ asset('storage/Image/Anggota/' . $anggota->foto) }}" class="img-fluid" alt="">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>{{ $anggota->nama }}</h4>
                                        <span>{{ $anggota->posisi }}</span>
                                    </div>
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Team Section -->


        <!-- ======= Contact Us Section ======= -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        @include('layouts.Frontend.footer-layout')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
