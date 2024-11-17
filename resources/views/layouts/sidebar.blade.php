<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('assets_dashboard/js/sidebare.js') }}"></script>
</head>
<body>
<br><br><br><br><br>
<a class="nav-link" href="{{ route('dashboard', ['user' => Auth::user()->id]) }}">
    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
    Dashboard
</a><br>
<a class="nav-link" href="{{route('products')}}">
<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
    Products
</a><br>
<a class="nav-link" href="{{route('orders')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    Orders
</a><br>
<a class="nav-link" href="{{route('users')}}">
<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
    Users
</a><br>
<a class="nav-link" href="{{route('orders.simulator')}}">
<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
    Simulator
</a><br>
<a class="nav-link" href="">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    Agent
</a><br>
<a class="nav-link" href="/profile">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    Profile
</a><br>

<!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
    Pages
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
            Authentication
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="login.html">Login</a>
                <a class="nav-link" href="register.html">Register</a>
                <a class="nav-link" href="password.html">Forgot Password</a>
            </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
            Error
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="401.html">401 Page</a>
                <a class="nav-link" href="404.html">404 Page</a>
                <a class="nav-link" href="500.html">500 Page</a>
            </nav>
        </div>
    </nav>
</div>
<div class="sb-sidenav-menu-heading">Addons</div>
<a class="nav-link" href="charts.html">
    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
    Charts
</a>
<a class="nav-link" href="tables.html">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
    Tables
</a> -->

</body>
</html>
