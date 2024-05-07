<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Not found | Result Analysis System</title>
    <link rel="icon" href="{{ asset('assets/images/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-color: aliceblue;">
    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-xl-6 col-md-5"> --}}
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                <p class="errorValue-size text-center m-0"><b>404</b></p>
                <p class="text-center"><b>OPPS! PAGE NOT FOUND</b></p>
                <p class="px-5 text-center">Sorry, the page you're looking for doesn't exists. If you think something is broken,
                    report a problem. </p>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <button class="btn btn-primary me-3 button-style"><a href="{{ url('/') }}" class="link-style">RETURN HOME</a></button>
                <button class="btn btn-light me-3 button-style"><a href="" class="link-style1">REPORT
                        PROBLEM</a></button>
            </div>
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
</body>

</html>
