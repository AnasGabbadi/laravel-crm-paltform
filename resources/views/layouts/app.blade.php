<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('assets_dashboard/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Include Moment.js from a CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            @include('layouts.navbar')
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @include('layouts.sidebar')
                        </div>
                    </div>
                    
                    <div class="sb-sidenav-footer">
                    <hr>
                        <div>{{auth()->user()->name}}</div>
                        {{auth()->user()->level}} 
                        <a href="/logout"><img src="{{ asset('assets_dashboard/img/deconnecter.png') }}" alt="" style="width: 35px;margin-left: 100px;margin-top: -30px;"></a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('contents')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    @include('layouts.footer')
                </footer>
            </div>
        </div>
        <script src="{{ asset('assets_dashboard/js/sidebare.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets_dashboard/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets_dashboard/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets_dashboard/assets/demo/chart-pie-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets_dashboard/js/datatables-simple-demo.js') }}"></script>
        @yield('scripts')   
        @yield('scriptsProducts')   
        @yield('scriptsOrders')   
        @yield('scriptsUsers')   
    </body>
</html>
