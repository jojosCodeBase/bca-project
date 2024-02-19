<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Analysis System | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="text-center mt-4">
                    <h1 class="h2">Result Analysis Portal</h1>
                    <p class="fs-5 fw-bold">
                        LogIn to Continue
                    </p>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 col">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4 text-center mt-2 mb-2">
                                <img src="{{ asset('assets/images/pp.avif') }}" alt=""
                                    class="img-fluid rounded-circle" width="130" height="130">
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="mx-4">
                                @csrf
                                <div class="mb-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Username" name="email"
                                            aria-label="Username" aria-describedby="basic-addon1" required>
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    </div>
                                    @error('email')
                                        <span class="text-danger fs-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password" required>
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger fs-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="checkbox" class="form-check user-select-none">Show Password
                                        <input type="checkbox" class="form-check-input" value="remember_me"
                                            name="remember-me" checked id="checkbox">
                                        <span class="form-check-label" id="#"></span>
                                    </label>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" class="btn btn-primary w-100 fw-bold" value="Login">
                                </div>
                                <div class="form-group text-center forgot-password">
                                    <a href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</html>
