<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Analysis System | Login</title>
    <link rel="icon" href="{{asset('assets/images/smitlogo2.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container">
            <div class="row d-flex justify-content-center align-content-center">
                <div class="text-center my-5">
                    <h1 class="h2">Result Analysis Portal</h1>
                </div>

                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row py-4">
                                <div class="col-5">
                                    <div class="m-sm-4 text-center mt-2 mb-2">
                                        <img src="{{ asset('assets/images/smitlogo2.jpg') }}" alt=""
                                            class="img-fluid rounded-circle" width="200" height="200">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <p class="fs-5 fw-bold text-center">
                                        Log In
                                    </p>

                                    <form method="POST" action="{{ route('login') }}" class="mx-4" id="enterFunc">
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
                                                    name="remember-me" id="checkbox">
                                                <span class="form-check-label" id="#"></span>
                                            </label>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="submit" class="btn btn-primary w-100 fw-bold" value="Login" id="">
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
    </main>
</body>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/showPassword.js') }}"></script>
</html>
