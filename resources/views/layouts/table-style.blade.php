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
</head>

<body>
    <div class="wrapper">
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom bg-light">

                <div class="">
                    <button class="btn btn-back" id="backButton">
                        <i class="bi bi-arrow-left fs-4"></i>
                    </button>
                </div>

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
                                <span class="text-dark">{{ Auth::user()->name }}</span>
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

            {{-- <main class="content  p-lx-4 p-lg-4 p-md-4"> --}}
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/toggleButton.js') }}"></script>
    <script src="{{ asset('assets/js/hidepoupdatetable.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    @yield('scripts')
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
</body>

</html>
