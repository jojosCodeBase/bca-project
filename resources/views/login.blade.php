<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login_page.css">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="text-center mt-4">
                    <h1 class="h2">Welcome to Result Analysis Portal</h1>
                    <p class="fs-5 fw-bold">
                        Sign in to Continue
                    </p>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 col">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4 text-center mt-2 mb-2">
                                <img src="{{ asset('assets/images/pp.avif') }}"
                                    alt=""
                                    class="img-fluid rounded-circle" width="130" height="130">
                            </div>
                            <form action="#" class="mx-4">
                                <div class="mb-4">
                                    <input type="email" name="email" id="email" placeholder="Enter Your Email"
                                        class="form-control rounded-0">
                                    <span class="text-danger" id="email-error"></span>
                                </div>
                                <div class="mb-4">
                                    <input type="password" name="password" id="password"
                                        placeholder="Enter Your Password" class="form-control rounded-0">
                                    <span class="text-danger" id="password-error"></span>
                                </div>
                                <div>
                                    <label for="checkbox" class="form-check user-select-none">Show Password
                                        <input type="checkbox" class="form-check-input" value="remember_me"
                                            name="remember-me" checked id="checkbox">
                                        <span class="form-check-label" id="#"></span>
                                    </label>
                                </div>
                                <div class="text-center mt-5">
                                    <input type="button" value="Login" class="btn btn-primary w-100" id="myButton"
                                        onclick="login()" />
                                </div>
                                <div class="mt-3 mb-4 text-center ">
                                    <a href="#" class="text-decoration-none">Forgot Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="login.js"></script>

</html>
