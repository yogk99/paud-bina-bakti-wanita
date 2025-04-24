<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAUD Bina Bakti Wanita - @yield('title')</title>
    <link rel="icon" href="{{ asset('favicon-paud.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background-color:rgb(0, 0, 0);
            color: white;
        }
        .sidebar .nav-link {
            color: rgb(255, 255, 255);
        }
        .sidebar .nav-link:hover {
            color: white;
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }
        .main-content {
            padding: 20px;
        }
        .header {
            background-color: #3b82f6;
            color: white;
            padding: 15px 0;
        }
        .logo {
            height: 50px;
        }
        .user-info {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @auth
                <div class="col-md-2 sidebar p-0">
                    <div class="d-flex flex-column p-3">
                        <h5 class="mb-4 text-center">Menu</h5>
                        
                        @if(Auth::user()->isAdmin())
                            <!-- Menu Admin -->
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                        <i class="fas fa-users me-2"></i> Pengguna
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.siswa.index') }}" class="nav-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                                        <i class="fas fa-user-graduate me-2"></i> Siswa
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.kelas.index') }}" class="nav-link {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}">
                                        <i class="fas fa-chalkboard me-2"></i> Kelas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.sentra.index') }}" class="nav-link {{ request()->routeIs('admin.sentra.*') ? 'active' : '' }}">
                                        <i class="fas fa-shapes me-2"></i> Sentra
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.pembayaran.index') }}" class="nav-link {{ request()->routeIs('admin.pembayaran.*') ? 'active' : '' }}">
                                        <i class="fas fa-money-bill-wave me-2"></i> Pembayaran
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.kritik-saran.index') }}" class="nav-link {{ request()->routeIs('admin.kritik-saran.*') ? 'active' : '' }}">
                                        <i class="fas fa-comments me-2"></i> Kritik & Saran
                                    </a>
                                </li>
                            </ul>
                        @elseif(Auth::user()->isGuru())
                            <!-- Menu Guru -->
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('guru.dashboard') }}" class="nav-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guru.kelas.index') }}" class="nav-link {{ request()->routeIs('guru.kelas.*') ? 'active' : '' }}">
                                        <i class="fas fa-chalkboard me-2"></i> Kelas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guru.jadwal.index') }}" class="nav-link {{ request()->routeIs('guru.jadwal.*') ? 'active' : '' }}">
                                        <i class="fas fa-calendar-alt me-2"></i> Jadwal
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guru.nilai.index') }}" class="nav-link {{ request()->routeIs('guru.nilai.*') ? 'active' : '' }}">
                                        <i class="fas fa-star me-2"></i> Nilai
                                    </a>
                                </li>
                            </ul>
                        @elseif(Auth::user()->isOrangtua())
                            <!-- Menu Orangtua -->
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('orangtua.dashboard') }}" class="nav-link {{ request()->routeIs('orangtua.dashboard') ? 'active' : '' }}">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orangtua.jadwal.index') }}" class="nav-link {{ request()->routeIs('orangtua.jadwal.*') ? 'active' : '' }}">
                                        <i class="fas fa-calendar-alt me-2"></i> Jadwal
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orangtua.nilai.index') }}" class="nav-link {{ request()->routeIs('orangtua.nilai.*') ? 'active' : '' }}">
                                        <i class="fas fa-star me-2"></i> Nilai
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orangtua.pembayaran.index') }}" class="nav-link {{ request()->routeIs('orangtua.pembayaran.*') ? 'active' : '' }}">
                                        <i class="fas fa-money-bill-wave me-2"></i> Pembayaran
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orangtua.kritik-saran.index') }}" class="nav-link {{ request()->routeIs('orangtua.kritik-saran.*') ? 'active' : '' }}">
                                        <i class="fas fa-comments me-2"></i> Kritik & Saran
                                    </a>
                                </li>
                            </ul>
                        @endif
                        
                        <hr>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger w-100">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-10 p-0 main-content">
            @else
                <div class="col-12 p-0 main-content">
            @endauth
                
                <!-- Header -->
                <div class="header">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>@yield('title') <img src="{{ asset('images/logo_paud.png') }}" alt="Logo PAUD" class="logo"> PAUD BINA BAKTI WANITA</h4>
                            </div>
                            @auth
                                <div class="col-md-6 text-end user-info">
                                    <span>{{ Auth::user()->name }}</span> | 
                                    <span class="badge bg-light text-dark">
                                        @if(Auth::user()->isAdmin())
                                            Admin
                                        @elseif(Auth::user()->isGuru())
                                            Guru
                                        @elseif(Auth::user()->isOrangtua())
                                            Orangtua
                                        @endif
                                    </span>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="container mt-3">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    @yield('scripts')
</body>
</html>