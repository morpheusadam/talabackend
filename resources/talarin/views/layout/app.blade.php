<!DOCTYPE html>
<html lang="fa">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    @include('layout.head')
</head>
<!-- Body-->

<body dir="rtl">
    <!-- Demo switcher (offcanvas)-->

    <!-- Page loading spinner-->
    @include('components.loadingspinner')
    <!-- end Page loading spinner-->


    <main class="page-wrapper">
        <!-- Sign -Signup In Modal-->
        @include('components.auth')
        <!-- Navbar-->
        <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-scroll-header>
            @include('layout.navbar')
        </header>
        <!-- Page content-->

@yield('content')
    </main>
    <!-- Footer-->
    <footer class="footer pt-lg-5 pt-4 bg-dark text-light">
        @include('layout.footer')
    </footer>
    @include('layout.metafooter')
</body>

</html>
