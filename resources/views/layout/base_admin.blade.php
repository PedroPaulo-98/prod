<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Nazareno Macapá</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="/pages/img/indice.jpg" rel="icon">
        <link href="/pages/img/indice.jpg" rel="apple-touch-icon">

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

        <!-- Main CSS File -->
        <link href="/css/style.css" rel="stylesheet">
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="home">Nazareno</a>
            <button class="btn btn-link btn-sm order-1 order-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <div class="d-none d-md-inline-block form-inline ms-auto order-1 me-0 me-md-3 my-2 my-md-0"></div>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 order-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nome<i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="sair">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="home">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <a class="nav-link collapsed" href="#collapsePages" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Páginas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="sobre">Sobre</a>
                                    <a class="nav-link" href="boletim">Boletim</a>
                                    <a class="nav-link" href="missoes">Misões</a>
                                    <a class="nav-link" href="ministerios">Ministérios</a>
                                    <a class="nav-link" href="culto">Culto</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav> -->
            </div>
            <div id="layoutSidenav_content">
                @yield('content')

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Website</div>
                    </div>
                </footer>
            </div>
        </div>

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
        @yield('script')
    </body>
</html>