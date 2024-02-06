<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe-Book-Details</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300, 300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        img.img-fluid {
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 16px 16px rgba(0, 0, 0, 0.3);
        }

        form {
            text-align: center;
        }

        .input-group {
            width: 100%;
            height: 60px;
            max-width: 500;
            margin: 0 auto;

        }

        .form-control {
            border-radius: 40px;
            border-top: 3px solid #ffc107;
            border-bottom: 3px solid #ffc107;
            border-left: 3px solid #ffc107;
        }

        .btn {
            border-radius: 40px;
        }

        .btn:hover {
            background-color: #99f101;
            border: #99f101;
        }

        .navbar a i,
        .navbar a i:hover {
            font-size: 20px;
            margin-right: 6px;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 class="text-light"><a href="index.html"><span>RECIPEBOOK</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    @auth
                        <li><a href="#" class="nav-link"><i class="bi bi-person"></i>{{ Auth::user()->email }}</a>
                        </li>
                        <li><a href="{{ route('logout') }}" class="nav-link"><i
                                    class="bi bi-box-arrow-right"></i>Logout</a></li>
                        <li><a href="{{ url('/addRecipeForm') }}"><i class="bi bi-plus-square"></i>Recette</a></li>
                        {{-- mes recettes --}}
                    @else
                        <li><a href="{{ route('login_form') }}" class="nav-link"><i class="bi bi-person-fill"></i>Se
                                connecter</a></li>
                    @endauth
                    <li><a href="{{ route('home') }}"><i class="bi bi-house-door"></i>Accueil</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <main id="main">
        <!-- ======= About Section ======= -->
        <section class="about" data-aos="fade-up">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('storage/' . $recette->img) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>{{ $recette->titre }}</h3>
                        <p class="fst-italic">
                            Description: {{ $recette->description }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> Ingredients: {{ $recette->ingredients }}</li>
                            <li><i class="bi bi-check2-circle"></i>Instructions: {{ $recette->instructions }}</li>
                        </ul>
                        <p class="card-user">Par: {{ $recette->user->email }}</p>
                        @auth
                            @if (Auth::user()->id == $recette->user->id)
                                <div>
                                    <a href="{{ url('updtForm/' . $recette->idr) }}" class="btn btn-primary mr-2">Edit</a>
                                    <a href="{{ route('delete', ['id' => $recette->idr]) }}"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>About Moderna</h3>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>RECIPEBOOK</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
