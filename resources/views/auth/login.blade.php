<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Result Analysis System</title>
    <link rel="icon" href="{{ asset('assets/images/smitlogo2.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body style="background-color: aliceblue">
    {{-- <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome to SMIT-NSS Portal</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="https://smitnss.darjeelingcab.in/assets/img/icons/admin-icon.png" alt="admin_image"
                                            class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <form action="https://smitnss.darjeelingcab.in/login" method="POST">
                                        <input type="hidden" name="_token" value="OTgqE6cLAnb1sEhQsnXVr4p3gSJEvPKqpR43C9dJ" autocomplete="off">                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                id="email" placeholder="Enter your email" required>
                                            <span class="text-danger" id="email-error"></span>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                id="password" placeholder="Enter your password" required>
                                            <span class="text-danger" id="password-error"></span>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me"
                                                    name="remember-me" checked>
                                                <span class="form-check-label">
                                                    Remember me
                                                </span>
                                            </label>
                                        </div>
                                        <div class="text-center mt-3">
                                            <input type="submit" class="btn btn-lg btn-primary w-100 fw-bold fs-4"
                                                value="Login">
                                        </div>
                                        <div class="mt-2 text-center">
                                            <a href="https://smitnss.darjeelingcab.in/forgot-password">Forgot password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> --}}
    <main class="d-flex w-100">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="text-center mt-5 mb-3">
                    <h1 class="h2">Result Analysis System</h1>
                </div>

                <div class="col-xl-7 col-12">
                    <div class="login">
                        <div class="card shadow-lg p-xl-3 mb-xl-5 border-0">
                            <div class="card-body">
                                <div class="row py-xl-4">
                                    <div class="col-xl-5 col-12">
                                        <div class="m-sm-4 text-center mt-2 mb-2">
                                            <img src="{{ asset('assets/images/education-vector.jpg') }}" alt=""
                                                class="login-img">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-12">
                                        <h4 class="fw-bold">Welcome Back!</h4>
                                        <span class="text-muted mb-5">Login to your account to continue</span>

                                        <form method="POST" action="{{ route('login') }}" class="mx-0 mt-3"
                                            id="enterFunc">
                                            @csrf

                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Username"
                                                        name="email" aria-label="Username"
                                                        aria-describedby="basic-addon1" required>
                                                    <span class="input-group-text  bg-transparent"><i
                                                            class="bi bi-person-fill"></i></span>
                                                </div>
                                                @error('email')
                                                    <span class="text-danger fs-6">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="Password" required>
                                                    <span class="input-group-text bg-transparent"><i
                                                            class="bi bi-lock-fill"></i></span>
                                                </div>
                                                @error('password')
                                                    <span class="text-danger fs-6">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="checkbox" class="form-check user-select-none">Show Password
                                                    <input type="checkbox" class="form-check-input" value="remember_me"
                                                        name="remember-me" id="checkbox">
                                                    <span class="form-check-label" id="#"></span>
                                                </label>
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="submit" class="btn btn-primary w-100 fw-bold"
                                                    value="Login" id="">
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
                </div>
            </div>
        </div>
    </main>
</body>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/showPassword.js') }}"></script>

</html>
