<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            background-color: aliceblue;
            font-family: 'Poppins', sans-serif;
            opacity: 1;
            overflow-y: scroll;
            margin: 0;
        }

        img {
            width: 100px;

        }

        .btn {
            border: none;
        }

        a {
            color: black;
        }


        .text-custom {
            color: #355389;
        }

        button:hover {
            padding-bottom: 5px;
        }
        .rounded-circle{
            border: 3px solid #355389;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center text-custom mb-5 mt-5">Meet Our Team</h2>
        <!-- <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('assets/images/admin.png') }}" alt="" class="rounded-circle img-fluid">
                        </div>
                        <div class="text-center">
                            <h5>Bikram Das</h5>
                        </div>
                        <div class="mb-3 text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sequi distinctio,
                            reiciendis
                        </div>
                        <div class="text-center mb-3">
                            <h5>Frontend Devloper</h5>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-facebook pe-3"></i>
                            <i class="bi bi-twitter pe-3"></i>
                            <i class="bi bi-instagram pe-3"></i>
                            <i class="bi bi-github"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-3">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('assets/images/profile-images/frontend-developer.jpg') }}" alt=""
                                class="rounded-circle img-fluid">
                        </div>
                        <div class="text-center">
                            <h5>Bikram Das</h5>
                        </div>
                        <div class="mb-3 text-center">
                           I am a skilled Frontend Developer with expertise in Bootstrap for creating sleek and responsive interfaces.
                        </div>
                        <div class="text-center mb-3">
                            <h6>Frontend Devloper</h6>
                        </div>
                        <div class="text-center">
                            <!--
                                <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                    <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"></use></svg>
                                    <i class="bi bi-facebook"></i>
                                  </a>
                            -->

                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                                href="https://www.linkedin.com/in/bikram-das-3b15712b4?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                target="_blank">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-linkedin"></i>
                            </a>


                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                                href="https://www.instagram.com/b_i_k_r_a_m_5?igsh=Mno3OTN0cXpsNGg0" target="_blank">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-instagram"></i>
                            </a>


                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                                href="https://github.com/Bikram-57" target="_blank">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-github"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('assets/images/profile-images/backend-developer.jpg') }}" alt=""
                                class="rounded-circle img-fluid">
                        </div>
                        <div class="text-center">
                            <h5>Kunsang Moktan</h5>
                        </div>
                        <div class="mb-3 text-center">
                            <span style="font-size: 15px;">I am proficient in PHP Laravel and MySQL, with hands-on experience in developing scalable backend solutions.</span>
                        </div>
                        <div class="text-center mb-3">
                            <h6>Backend Devloper</h6>
                        </div>
                        <div class="text-center">
                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                                href="https://www.linkedin.com/in/kunsang-moktan-148b74214/" target="_blank">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-linkedin"></i>
                            </a>

                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                                href="https://www.instagram.com/jojo_kunsang/" target="_blank">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                                href="https://github.com/jojosCodeBase" target="_blank">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-github"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('assets/images/admin.png') }}" alt=""
                                class="rounded-circle img-fluid">
                        </div>
                        <div class="text-center">
                            <h5>Aditya Kumar</h5>
                        </div>
                        <div class="mb-3 text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sequi distinctio,
                            reiciendis
                        </div>
                        <div class="text-center mb-3">
                            <h5>Tester</h5>
                        </div>
                        <div class="text-center">
                            <!--
                                <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                    <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"></use></svg>
                                   <i class="bi bi-facebook"></i>
                                  </a>
                            -->
                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-linkedin"></i>
                            </a>

                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-github"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('assets/images/admin.png') }}" alt=""
                                class="rounded-circle img-fluid">
                        </div>
                        <div class="text-center">
                            <h5>Gautam Sarma</h5>
                        </div>
                        <div class="mb-3 text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas sequi distinctio,
                            reiciendis
                        </div>
                        <div class="text-center mb-3">
                            <h5>Content Writer</h5>
                        </div>
                        <div class="text-center">
                            <!--
                                <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                    <svg class="bi" aria-hidden="true"><use xlink:href="#clipboard"></use></svg>
                                   <i class="bi bi-facebook"></i>
                                  </a>
                            -->
                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-linkedin"></i>
                            </a>

                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a class="icon-link icon-link-hover"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="#">
                                <svg class="bi" aria-hidden="true">
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                <i class="bi bi-github"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
