<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Result Analysis System</title>
    <link rel="icon" href="{{asset('assets/images/smitlogo2.ico')}}" type="image/x-icon">
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
                    <li class="sidebar-item {{ request()->is('co_po_relation') ? 'active' : '' }}">
                        <a href="{{ url('/co_po_relation') }}" class="sidebar-nested-link">
                            <i class="bi bi-cloud-arrow-up-fill"></i> CO/PO Relation 
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
                    <li class="sidebar-item">
                        <span class="sidebar-link">
                            <i class="bi bi-clipboard2-data-fill"></i> Courses
                        </span>
                    </li>
                    <li class="sidebar-item {{ request()->is('subjects') ? 'active' : '' }}">
                        <a href="{{ route('subjects') }}" class="sidebar-nested-link">
                            <i class="bi bi-calendar-fill"></i> List All Subjects
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('add-subject') ? 'active' : '' }}">
                        <a href="{{ route('add-subject-view') }}" class="sidebar-nested-link">
                            <i class="bi bi-file-earmark-plus-fill"></i> Add Subject
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('tables') ? 'active' : '' }}">
                        <a href="{{ route('tables') }}" class="sidebar-nested-link">
                            <i class="bi bi-database-gear"></i> Database Tables
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
                                <img src="{{ asset('assets/images/admin.png') }}" class="rounded-circle avatar img-fluid"
                                    alt="profile-ph">
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('profile.edit') }}" class="dropdown-item"><i
                                    class="bi bi-person-fill fs-5 pe-1"></i> Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-right fs-5 pe-1"></i> Log-Out</button>
                                    @csrf
                                </form>
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

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/toggleButton.js') }}"></script>
    <script src="date.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/hidepoupdatetable.js') }}"></script>

    @yield('scripts')
</body>

</html>
