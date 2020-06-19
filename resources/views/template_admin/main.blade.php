<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>@yield('title')</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('public/assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/modules/fontawesome/css/all.min.css') }}">

<!-- CSS Libraries -->

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/modules/select2/dist/css/select2.min.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>

        </form>
        <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('public/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                
            </div>
        </li>
        </ul>
    </nav>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ '/' }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-pen"></i> <span>Posting</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{ route('post.index') }}">List Posting</a></li>
                    <li class=""><a class="nav-link" href="{{ route('post.tampil_sampah') }}">Sampah</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-align-left"></i> <span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{ route('category.index') }}">List Kategori</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-hashtag"></i> <span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{ route('tag.index') }}">List Tag</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-user"></i> <span>User</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{ route('user.index') }}">List User</a></li>
                </ul>
            </li>
            
            
            </aside>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('sub-menu')</h1>
            </div>
            @yield('content')
        </section>
    </div>
    <footer class="main-footer">
        <div class="footer-left">
        Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
        
        </div>
    </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('public/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/modules/popper.js') }}"></script>
<script src="{{ asset('public/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('public/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('public/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('public/assets/js/stisla.js') }}"></script>
<script src="{{ asset('public/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('public/assets/js/scripts.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
</body>
</html>