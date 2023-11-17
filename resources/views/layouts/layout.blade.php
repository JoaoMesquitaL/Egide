<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Egide</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/easyzoom.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- EXZOOM-->
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">


</head>

<body>

    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3 href="/">E<span>gide</span></h3>
        </div>

        <div class="side-content">

            <div class="side-menu">
                <ul>
                    <li>
                        <a href="{{ route('displayproducts') }}">
                            <span class="bi bi-shop"></span>
                            <small>Vendas</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('stockproducts') }}">
                            <span class="bi bi-box-seam"></span>
                            <small>Estoque</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('indexproducts') }}" class="active">
                            <span class="bi bi-basket"></span>
                            <small>Produtos</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('report') }}">
                            <span class="bi bi-graph-up-arrow"></span>
                            <small>Relatórios</small>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">

        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="bi bi-list" style="color: white"></span>
                </label>

                <div class="header-menu">
                    <!-- <label for="">
                        <span class="bi bi-search"></span>
                    </label>-->
                    <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control form-control-light text-bg-light" placeholder="Search..." aria-label="Search">
                       
                    </form>-->

                    <div class="notify-icon">
                        <span class="bi bi-bell" style="color: white"></span>
                    </div>


                    <div class="notify-icon">
                        <a href="{{ route('cart') }}">
                            <span class="bi bi-cart" style="color: white">{{ \Cart::getContent()->sum('quantity') }}</span>
                        </a>
                    </div>

                    <div class="user">
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small">
                              <li><a class="dropdown-item" href="#">Perfil</a></li>
                              <li><a class="dropdown-item" href="#">Configurações</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </x-dropdown-link>
                                </form>
                                
                            </li>
                            </ul>

                            
                          </div>


                        <!--<div class="bg-img"></div>

                        <span class="las la-power-off"></span>
                        <span>Logout</span>-->
                    </div>


                </div>
            </div>
        </header>


        <main>

            <div class="page-header">

            </div>
            @yield('content')

         

            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
            <script src="{{ asset('assets/js/main.js') }}"></script>
            <script src="{{ asset('assets/js/chart.js') }}"></script>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>

            <script src="https://code.jquery.com/jquery-1.12.4.min.js"
                integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
                crossorigin="anonymous">
            </script>

            <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>

            <script type="text/javascript" src="{{ asset('assets/js/easyzoom.js') }}"></script>
            <script>
                // Instantiate EasyZoom instances
                var $easyzoom = $('.easyzoom').easyZoom();

                // Setup thumbnails example
                var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

                $('.thumbnails').on('click', 'a', function(e) {
                    var $this = $(this);

                    e.preventDefault();

                    // Use EasyZoom's `swap` method
                    api1.swap($this.data('standard'), $this.attr('href'));
                });

                // Setup toggles example
                var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

                $('.toggle').on('click', function() {
                    var $this = $(this);

                    if ($this.data("active") === true) {
                        $this.text("Switch on").data("active", false);
                        api2.teardown();
                    } else {
                        $this.text("Switch off").data("active", true);
                        api2._init();
                    }
                });
            </script>

    </div>

</body>


</html>