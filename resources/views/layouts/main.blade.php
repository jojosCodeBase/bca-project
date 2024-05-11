<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Result Analysis System</title>
    <link rel="icon" href="{{ asset('assets/images/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="sidebarMobile">
            <!-- Content for sidebar -->
            <div class="h-100">
                {{-- <div class="sidebar-logo"> --}}
                <div>
                    {{-- <a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-fluid"></a> --}}
                    <a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"
                            class="img-fluid"></a>
                </div>
                @if (Auth::user()->is_faculty)
                    <ul class="sidear-nav">
                        <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="sidebar-link">
                                <i class="bi bi-sliders"></i> Dashboard
                            </a>
                        </li>
                    @else
                        <ul class="sidear-nav">
                            <li class="sidebar-item {{ Route::is('admin-dashboard') ? 'active' : '' }}">
                                {{-- <li class="sidebar-item {{ request()->is('admin/dashboard') ? 'active' : '' }}"> --}}
                                <a href="{{ route('admin-dashboard') }}" class="sidebar-link">
                                    <i class="bi bi-sliders"></i> Dashboard
                                </a>
                            </li>
                @endif
                <li class="sidebar-item">
                    <span class="sidebar-link">
                        <i class="bi bi-three-dots-vertical"></i> Menu
                    </span>
                </li>
                <li class="sidebar-item {{ Route::is('upload') ? 'active' : '' }}">
                    <a href="{{ route('upload') }}" class="sidebar-nested-link">
                        <i class="bi bi-file-earmark-arrow-up-fill"></i> Upload Data
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('fetch') ? 'active' : '' }}">
                    <a href="{{ route('fetch') }}" class="sidebar-nested-link">
                        <i class="bi bi-file-earmark-arrow-down-fill"></i> Fetch Data
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('co_po_relation') ? 'active' : '' }}">
                    <a href="{{ route('co_po_relation') }}" class="sidebar-nested-link">
                        <i class="bi bi-cloud-arrow-up-fill"></i> CO-PO Relation
                    </a>
                </li>
                @if (!Auth::user()->is_faculty)
                    <li class="sidebar-item {{ Route::is('direct-attainment') ? 'active' : '' }}">
                        <a href="{{ route('direct-attainment') }}" class="sidebar-nested-link">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Direct Attainment
                        </a>
                    </li>
                @endif

                <li class="sidebar-item">
                    <span class="sidebar-link">
                        <i class="bi bi-clipboard2-data-fill"></i> Analysis
                    </span>
                </li>

                <li class="sidebar-item {{ Route::is('subject-report') ? 'active' : '' }}">
                    <a href="{{ route('subject-report') }}" class="sidebar-nested-link">
                        <i class="bi bi-bar-chart-line"></i> Subject Report
                    </a>
                </li>

                {{-- <div class="dropdown dropdown-style">
                    <button class="btn btn-primary dropdown-toggle btn-style" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bar-chart-line"></i> Subject Report
                      </button>

                      <ul class="dropdown-menu dropdown-menu-light ">
                        <li class="sidebar-item {{ Route::is('bca-analysis') ? 'active' : '' }}">
                            <a href="{{ route('bca-analysis') }}" class="sidebar-nested-link">
                                <i class="bi bi-calendar-fill"></i> BCA
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('mca-analysis') ? 'active' : '' }}">
                            <a href="{{ route('mca-analysis') }}" class="sidebar-nested-link">
                                <i class="bi bi-calendar3"></i> MCA
                            </a>
                        </li>
                      </ul>
                </div> --}}


                {{-- <li class="sidebar-item {{ Route::is('bca-analysis') ? 'active' : '' }}">
                    <a href="{{ route('bca-analysis') }}" class="sidebar-nested-link">
                        <i class="bi bi-calendar-fill"></i> BCA
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('mca-analysis') ? 'active' : '' }}">
                    <a href="{{ route('mca-analysis') }}" class="sidebar-nested-link">
                        <i class="bi bi-calendar3"></i> MCA
                    </a>
                </li> --}}
                @if (!Auth::user()->is_faculty)
                    <li class="sidebar-item">
                        <span class="sidebar-link">
                            <i class="bi bi-journal-text"></i> Subjects
                        </span>
                    </li>
                    <li class="sidebar-item {{ request()->is('admin/manage-subjects') ? 'active' : '' }}">
                        <a href="{{ route('manage-subjects') }}" class="sidebar-nested-link">
                            <i class="bi bi-kanban-fill"></i> Manage Subjects
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('admin/assign-subject') ? 'active' : '' }}">
                        <a href="{{ route('assign-subject') }}" class="sidebar-nested-link">
                            <i class="bi bi-card-checklist"></i> Assign Subjects
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <span class="sidebar-link">
                            <i class="bi bi-three-dots-vertical"></i> Faculty
                        </span>
                    </li>
                    <li class="sidebar-item {{ request()->is('admin/manage-faculty') ? 'active' : '' }}">
                        <a href="{{ route('manage-faculty') }}" class="sidebar-nested-link">
                            <i class="bi bi-people-fill"></i> Manage Faculty
                        </a>
                    </li>
                    </ul>
                @endif
            </div>
        </aside>

        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom bg-light">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="breadcrumb-bar text-custom px-3">
                    <span class="breadcrumb-item fs-6">
                        @yield('breadcrumb')
                    </span>
                </div>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="{{ asset('assets/images/admin.png') }}"
                                    class="rounded-circle avatar img-fluid" alt="profile-ph">
                                <span
                                    class="text-custom d-none s-md-inline d-lg-inline d-xl-inline d-xxl-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('profile.edit') }}" class="dropdown-item"><i
                                        class="bi bi-person-fill fs-5 pe-1"></i>
                                    Profile
                                </a>
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
            {{-- <div class="">
                @yield('Progress-bar')
            </div> --}}
            {{-- <main class="content p-lx-3 p-lg-3 p-md-3 pt-3"> --}}
            <main class="content">
                @yield('content')
                <footer class="footer p-3" style="background-color: #eceff3">
                    {{-- <div class="container bg-info"> --}}
                    <span>All rights reserved. Designed and developed by <a
                            href="https://smu.edu.in/smit/dept-faculty/dept-list/dept-ca-smit.html"
                            target="_blank">Department of Computer Applications</a>, Sikkim Manipal Institute of
                        Technology</span>
                    {{-- </div> --}}
                </footer>
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/toggleButton.js') }}"></script> --}}
    <script src="{{ asset('assets/js/hidepoupdatetable.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/showPassword.js') }}"></script> --}}
    @yield('scripts')

    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/progress-bar.js') }}"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
</body>

</html>
