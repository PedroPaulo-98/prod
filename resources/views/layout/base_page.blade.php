<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>PRODAP</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="/pages/img/icon.png" rel="icon">
        <link href="/pages/img/icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- CSS Files -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="/pages/lib/icofont/icofont.min.css" rel="stylesheet">
        <link href="/pages/lib/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="/pages/lib/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="/pages/lib/venobox/venobox.css" rel="stylesheet">
        <link href="/pages/lib/remixicon/remixicon.css" rel="stylesheet">
        <link href="/pages/lib/aos/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icofont/1.0.1/css/icofont.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <!-- Main CSS File -->
        <link href="/pages/css/style.css" rel="stylesheet">

    </head>
    <body>
        <header id="header" class="fixed-top header-inner-pages">
            <div class="container d-flex align-items-center justify-content-between">
                <a href="#" class="logo"><img src="/pages/img/logo.png" alt="" class="img-fluid"></a>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="{{ $route == 'home' ? 'active' : '' }}"><a href="{{ $route == 'home' ? '#home-top' : route('page.home') }}">Visão Geral</a></li>
                        <li class="{{ $route == 'about' ? 'active' : '' }}"><a href="{{ route('page.about') }}">Sobre</a></li>
                    </ul>
                </nav>
                <a href="/admin" class="get-started-btn scrollto">Sistema</a>
            </div>
        </header>

        @yield('content')

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="footer-info">
                                <p>Siga-nos</p>
                                <div class="social-links mt-3">
                                    <a href="https://www.youtube.com/channel/UC2zfg42btVZDcXegZqQIt9Q" class="twitter" target="_blank"><i class="bx bxl-youtube"></i></a>
                                    <a href="https://www.facebook.com/Nazarenomacapa.ap/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                                    <a href="https://www.instagram.com/prodap.ap/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <strong><span>PRODAP <br> Centro de Gestão de Tecnologia da Informação</span></strong><br>
                    Todos os direitos reservado
                </div>
            </div>
        </footer>

        <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
        <div id="preloader"></div>

        <script src="/pages/lib/jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="/pages/lib/jquery.easing/jquery.easing.min.js"></script>
        <script src="/pages/lib/owl.carousel/owl.carousel.min.js"></script>
        <script src="/pages/lib/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/pages/lib/venobox/venobox.min.js"></script>
        <script src="/pages/lib/waypoints/jquery.waypoints.min.js"></script>
        <script src="/pages/lib/counterup/counterup.min.js"></script>
        <script src="/pages/lib/aos/aos.js"></script>
        <script src="/pages/lib/jQueryMask1.14.15/jquery.mask.min.js"></script>
        <script src="/pages/js/pages/home.js"></script>
    </body>
</html>