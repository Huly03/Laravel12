<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Coming-soon</title>

    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/classy-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
                footer.site-footer {
            padding: 20px;
            background: #222;
            color: white;
        }

        footer {
            background-color: white;
            color: black;
            padding: 40px 0;
            font-size: 14px;
            z-index: 1000;
            /* Giảm z-index */
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            width: 30%;
            margin-bottom: 20px;
            flex-basis: 30%;
        }

        @media (max-width: 768px) {
            .footer-section {
                width: 100%;
            }
        }

        .footer-section h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-section a {
            color: navy;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }

        .footer-section a:hover {
            color: navy;
        }

        .social-icons {
            display: flex;
            justify-content: start;
            gap: 10px;
            margin-top: 10px;
        }

        .social-icons a {
            font-size: 20px;
            color: navy;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: navy
        }

    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <div class="coming-soon-area bg-img background-overlay" style="background-image: url({{ asset('img/bg-img/00101.jpg') }});">
        <!-- ##### Header Area Start ##### -->
        <header class="header-area">

            <!-- Top Header Area -->
            <div class="top-header">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Breaking News Area -->
                        <div class="col-12 col-sm-8">
                            <div class="breaking-news-area">
                                <div id="breakingNewsTicker" class="ticker">
                                    <ul>
                                        <li><a href="#">Hello World!</a></li>
                                        <li><a href="#">Hello Universe!</a></li>
                                        <li><a href="#">Hello Architecture!</a></li>
                                        <li><a href="#">Hello Earth!</a></li>
                                        <li><a href="#">Hello ArchStyAi!</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Top Social Area -->
                        <div class="col-12 col-sm-4">
                            <div class="top-social-area">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                    class="fab fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i
                                    class="fab fa-dribbble"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Behance"><i
                                    class="fab fa-behance"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo Area -->
            <div class="logo-area text-center">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <a href="/" class="original-logo" style="font-size: 5rem; font-weight: bold; color: aliceblue;">
                                Architecture Style Recognition</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Coming Soon Area Start ##### -->
        <div class="coming-soon-timer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="coming-soon-content">
                            <div class="sonar-wrapper">
                                <div class="sonar-emitter">
                                    <div class="sonar-wave">
                                    </div>
                                </div>
                            </div>
                            <p>our website is coming soon</p>
                        </div>
                        <div id="clock" class="d-flex align-items-center justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Coming Soon Area End ##### -->

        <!-- ##### Contact Area Start ##### -->
        <div class="contact-area section-padding-100">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Contact Form Area -->
                    <div class="col-12 col-md-10 col-lg-9">
                        <div class="contact-form">
                            <h5>Get in Touch</h5>
                            <!-- Contact Form -->
                            <form action="#" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="name" id="name" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="email" name="email" id="email" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <input type="text" name="subject" id="subject" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="message" id="message" required></textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn original-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-10 col-lg-3">
                        <div class="post-sidebar-area">
                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <h5 class="title subscribe-title">Subscribe to my newsletter</h5>
                                <div class="widget-content">
                                    <form action="#" class="newsletterForm">
                                        <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here">
                                        <button type="submit" class="btn original-btn">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Instagram Feed Area Start ##### -->
    
    <!-- ##### Instagram Feed Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer>
        <div class="container footer-container">
            <div class="footer-section">
                <h5>Company</h5>
                <a href="#">{{ $config->business_info }}</a>
            </div>
            <div class="footer-section">
                <h5>Address</h5>
                <a href="#">{{ $config->address }}</a>
            </div>
            <div class="footer-section">
                <h5>Contact</h5>
                <a href="tel:{{ $config->contact_phone }}">{{ $config->contact_phone }}</a>
                <a href="mailto:{{ $config->contact_email }}">{{ $config->contact_email }}</a>
                <div class="social-icons">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                            class="fab fa-pinterest"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i
                            class="fab fa-dribbble"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Behance"><i
                            class="fab fa-behance"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
    <!-- jQuery trước -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel CSS -->
    <!-- Owl Carousel CSS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
</body>
</html>