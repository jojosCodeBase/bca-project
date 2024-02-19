<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>


    <div class="wrapper">
        <aside id="sidebar">
            <!-- Content for sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Result Analysis</a>
                </div>
                <ul class="sidear-nav">
                    <li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <a href="{{ url('/dashboard') }}" class="sidebar-link">
                            <i class="bi bi-sliders"></i> Dashboard
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <span class="sidebar-link">
                            <i class="bi bi-three-dots-vertical"></i> Menu
                        </span>
                    </li>
                    <li class="sidebar-item {{ request()->is('upload') ? 'active' : '' }}">
                        <a href="{{ url('/upload') }}" class="sidebar-nested-link">
                            <i class="bi bi-file-earmark-arrow-up-fill"></i> Upload Data
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('fetch') ? 'active' : '' }}">
                        <a href="{{ url('/fetch') }}" class="sidebar-nested-link">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i> Fetch Data
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <span class="sidebar-link">
                            <i class="bi bi-clipboard2-data-fill"></i> Analysis
                        </span>
                    </li>
                    <li class="sidebar-item {{ request()->is('semester') ? 'active' : '' }}">
                        <a href="{{ url('/semester') }}" class="sidebar-nested-link">
                            <i class="bi bi-calendar-fill"></i> Semester Wise
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('year') ? 'active' : '' }}">
                        <a href="{{ url('/year') }}" class="sidebar-nested-link">
                            <i class="bi bi-calendar3"></i> Year Wise
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom bg-light">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="breadcrumb-bar text-primary px-3">
                    <span class="breadcrumb-item fs-6">
                        Dashboard
                    </span>
                </div>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ asset('assets/images/admin.png') }}" class="avatar img-fluid"
                                    alt="profile-ph">
                                <span class="text-dark">Admin</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{url('profile')}}" class="dropdown-item">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Log-Out</a>
                            </div>

                        </li>
                    </ul>

                </div>
            </nav>

            <main class="content p-lx-4 p-lg-4 p-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="button.js"></script>
    <script src="date.js"></script>
    <script src="{{ asset('assets/js/script.js')}}"></script>

    @yield('scripts')
</body>

</html>
