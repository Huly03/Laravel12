<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Architecture Style Recognition</title>


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
        body {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        header.site-header {
            background-color: #222;
            padding: 15px 0;
        }

        header .logo a {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .main-nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .main-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        .hero {
            height: 400px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .hero .btn {
            display: inline-block;
            background: #007BFF;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        .features {
            background: white;
            padding: 60px 0;
        }

        .feature-grid {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }

        .feature-box {
            flex: 1;
            min-width: 250px;
            text-align: center;
            background: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
        }

        .feature-box img {
            width: 60px;
            margin-bottom: 15px;
        }

        .latest-blogs {
            padding: 60px 0;
            background-color: #fff;
        }

        .section-title {
            font-size: 28px;
            text-align: center;
            margin-bottom: 40px;
        }

        .blog-grid {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .blog-card {
            background: #f5f5f5;
            border-radius: 8px;
            overflow: hidden;
            flex: 1;
            min-width: 280px;
        }

        .blog-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .blog-card h4 {
            font-size: 18px;
            padding: 15px;
        }

        .blog-card p {
            padding: 0 15px 15px;
        }

        .blog-card a {
            display: block;
            padding: 10px 15px;
            background: #007BFF;
            color: white;
            text-align: center;
            text-decoration: none;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .cta-section {
            background: #007BFF;
            color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .cta-section .btn {
            background: white;
            color: #007BFF;
            padding: 10px 25px;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

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

        .auth-buttons {
            display: flex;
            gap: 8px;
        }

        .auth-btn {
            padding: 8px 20px;
            border-radius: 3px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s;
        }

        .login-btn {
            background: transparent;
            color: #555;
            border: 1px solid #ddd;
        }

        .login-btn:hover {
            border-color: #007bff;
            color: #007bff;
        }

        .register-btn {
            background: #4a6fa5;
            color: white;
            border: 1px solid #4a6fa5;
        }

        .register-btn:hover {
            background: #3a5a8f;
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

    <!-- Subscribe Modal -->
    <div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <div class="modal-body">
                        <h5 class="title">Subscribe to my newsletter</h5>
                        <form action="{{ route('subscribe') }}" class="newsletterForm" method="post">
                            @csrf
                            <input type="email" name="email" id="subscribesForm2" placeholder="Your e-mail here"
                                required>
                            <button type="submit" class="btn original-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                    <li><a href="#">Hello ArchStyAi!</a></li>
                                    <li><a href="#">Hello Earth!</a></li>
                                    <li><a href="#">Hello Architecture! </a></li>
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
                        <a class="original-logo" href="/">
                            @if(!empty($config->logo))
                                <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" style="height: 200px;">
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between">
                        <!-- Subscribe btn -->
                        <div class="auth-buttons">
                            <a href="/login" class="btn auth-btn login-btn">Log in</a>
                            <a href="/register" class="btn auth-btn register-btn">Sign up</a>
                        </div>
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                                            <li><a href="{{ route('single-post') }}">Single Post</a></li>
                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                            <li><a href="{{ route('coming-soon') }}">Coming Soon</a></li>
                                            <li><a href="{{ route('architecture.viewOnly') }}">Architectures</a></li>
                                            <li><a href="{{ route('project.index') }}">Projects</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                                    <!-- <li><a href="#">Megamenu</a>
                                        <div class="dropdown">
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Headline 1</li>
                                                <li><a href="#">Mega Menu Item 1</a></li>
                                                <li><a href="#">Mega Menu Item 2</a></li>
                                                <li><a href="#">Mega Menu Item 3</a></li>
                                                <li><a href="#">Mega Menu Item 4</a></li>
                                                <li><a href="#">Mega Menu Item 5</a></li>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="https://drive.google.com/drive/folders/1mnsvfSjxPI2hM_KxWLmWZZaYdLKO1_C-?usp=drive_link">Download</a>

                                        <!-- <ul class="dropdown">
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                            <li><a href="#">Category 1</a></li>
                                        </ul> -->
                                    </li>
                                </ul>

                                <!-- Search Form -->
                                <div id="search-wrapper">
                                    <form action="{{ route('search') }}" method="get">
                                        <input type="text" id="search" name="query" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            <!-- Single Slide -->

            @foreach($architectures as $architecture)
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset($architecture->image_url) }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="slide-content text-center">
                                    <div class="post-tag">
                                        <a href="#" data-animation="fadeInUp">{{ $architecture->name }}</a>
                                    </div>
                                    <h2 data-animation="fadeInUp" data-delay="250ms">
                                        <a href="{{ route('architecture.detail', $architecture->id) }}">
                                            {{ Str::limit(strip_tags($architecture->description), 100) }}
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">ArchStyAi</a>
                            <h4><a href="#" class="post-headline">ARCHSTYAI is an innovative platform that uses advanced artificial intelligence to instantly identify architectural styles from photos. Simply upload a picture of any building, and our system will analyze it to reveal its architectural style. Sign up now to get 5 free identifications!</p>
                                <a href="/register" class="btn original-btn">Sign up</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="{{ asset('img/blog-img/0144.jpg') }}" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="#">Sign up now</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="{{ asset('img/blog-img/01195.jpg') }}" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="#">Get 5 free!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Single Blog Area -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s"
                        data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="{{ asset('img/blog-img/ross.jpg') }}" alt="">
                                    <div class="post-date">
                                        <a href="#">12 <span>May</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">ICAA</a>
                                    <h4><a href="https://www.classicist.org/calendar/events/the-44th-annual-arthur-ross-awards"
                                            class="post-headline">The 44th Annual Arthur Ross Awards</a></h4>
                                    <p>Established in 1982 by Classical America advocate, Arthur Ross (1910–2007), and
                                        its president, Henry Hope Reed (1916–2013), the Arthur Ross Awards were created
                                        to recognize and celebrate excellence in the classical tradition. From the
                                        beginning, the awards have recognized the achievements and contributions of
                                        architects, painters, sculptors, artisans, landscape designers, educators,
                                        publishers, patrons, and others dedicated to preserving and advancing the
                                        classical tradition.</p>
                                    <div class="post-meta">
                                        <p>By <a href="#">Arthur Ross</a></p>
                                        <p>Cipriani 42nd St, 110 East 42nd Street, New York, NY, USA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Area -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.3s"
                        data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="{{ asset('img/blog-img/book.jpg') }}" alt="">
                                    <div class="post-date">
                                        <a href="#">4 <span>June</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">ICAA</a>
                                    <h4><a href="https://www.classicist.org/calendar/events/tradition-redefined-designing-through-the-decades-with-ellie-cullman"
                                            class="post-headline">Tradition Redefined: Designing Through the Decades
                                            with Ellie Cullman</a></h4>
                                    <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus.
                                        Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero
                                        luctus, vel volutpat quam tincidunt.</p>
                                    <div class="post-meta">
                                        <p>By <a href="#">Ellie Cullman</a></p>
                                        <p>20 West 44th Street, New York, NY, USA
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Area -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s"
                        data-wow-duration="1000ms">
                        <div class="row">
                            <div class="col-12">
                                <div class="single-blog-thumbnail">
                                    <img src="{{ asset('img/blog-img/Un.jpeg') }}" alt="">
                                    <div class="post-date">
                                        <a
                                            href="https://www.classicist.org/calendar/courses/the-art-of-field-drawing-untermyer-gardens-2025">6
                                            <span>June</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Blog Content -->
                                <div class="single-blog-content mt-50">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">ArchStyAi</a>
                                    <h4><a href="#" class="post-headline">Explore over 150+ architectural styles from
                                            around the world</a></h4>
                                    <p>ArchStyAi, a comprehensive online platform dedicated to preserving and showcasing
                                        the rich diversity of architectural designs. Whether you're an architect,
                                        student, historian, or design enthusiast, our extensive database offers valuable
                                        insights into various architectural movements, from ancient to modern times
                                    </p>
                                    <div class="post-meta">
                                        <p>By <a href="#">Huy Ly</a></p>
                                        <p>2025</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Area -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.5s"
                        data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="{{ asset('img/blog-img/41.jpg') }}" alt="">
                                    <div class="post-date">
                                        <a href="#">12 <span>march</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    <a href="#" class="post-tag">ArchStyAi</a>
                                    <h4><a href="#" class="post-headline">Top 10 most famous architectural styles in the
                                            world</a></h4>
                                    <p>Classical, Gothic Baroque Renaissance, Art Nouveau, Bauhaus, Neoclassical,
                                        Modern,Italian Renaissance, Brutalism</p>
                                    <div class="post-meta">
                                        <p>By <a href="#">Huy Ly</a></p>
                                        <p>2025</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="load-more-btn mt-100 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1000ms">
                        <!-- <a href="#" class="btn original-btn">Read More</a> -->
                    </div>
                </div>

                <!-- ##### Sidebar Area ##### -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="post-sidebar-area">
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <form action="{{ route('search') }}" class="search-form" method="get">
                                <input type="search" name="query" id="searchForm" placeholder="Search">
                                <input type="submit" value="submit">
                            </form>
                        </div>

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title subscribe-title">Subscribe to my newsletter</h5>
                            <div class="widget-content">
                                <form action="{{ route('subscribe') }}" class="newsletterForm" method="post">
                                    @csrf
                                    <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here"
                                        required>
                                    <button type="submit" class="btn original-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Architecture</h5>
                            <a href="#"><img src="{{ asset(path: 'img/bg-img/giphy.webp') }}" alt="Advertisement"></a>
                        </div>

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Website</h5>
                            <div class="widget-content">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('img/blog-img/logo-blue-full.svg') }}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="https://www.archdaily.com" class="post-tag">ArchDaily</a>
                                        <h4><a href="https://www.archdaily.com" class="post-headline">The world's most
                                                visited architecture platform</a></h4>
                                        <div class="post-meta">
                                            <p><a href="https://www.archdaily.com">12 March</a></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('img/blog-img/image.png') }}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="https://www.snohetta.com" class="post-tag">Snøhetta</a>
                                        <h4><a href="https://www.snohetta.com" class="post-headline">Snøhetta is a
                                                global transdisciplinary practice</a></h4>
                                        <div class="post-meta">
                                            <p><a href="https://www.snohetta.com">12 March</a></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('img/blog-img/TAG_Black.png') }}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="https://traditionalarchitecturegroup.org" class="post-tag">Traditional
                                            architecture group</a>
                                        <h4><a href="https://traditionalarchitecturegroup.org"
                                                class="post-headline">Championing practitioners of new traditional
                                                architecture across the British Isles</a></h4>
                                        <div class="post-meta">
                                            <p><a href="https://traditionalarchitecturegroup.org">12 March</a></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Blog Post -->
                                <div class="single-blog-post d-flex align-items-center widget-post">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('img/blog-img/favicon.webp') }}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="https://architecturalheritage.com" class="post-tag">Architectural
                                            Heritage</a>
                                        <h4><a href="https://architecturalheritage.com"
                                                class="post-headline">Architectural Heritage offers a curated selection
                                                of European antiques and bespoke designs</a></h4>
                                        <div class="post-meta">
                                            <p><a href="#https://architecturalheritage.com">12 March</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Tags</h5>
                            <div class="widget-content">
                                <ul class="tags">
                                    <li><a href="#">design</a></li>
                                    <li><a href="#">construction</a></li>
                                    <li><a href="#">interior</a></li>
                                    <li><a href="#">architecture</a></li>
                                    <li><a href="#">gothic</a></li>
                                    <li><a href="#">baroque</a></li>
                                    <li><a href="#">modernism</a></li>
                                    <li><a href="#">landscape </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

    <!-- ##### Instagram Feed Area Start ##### -->
    <div class="instagram-feed-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="insta-title">
                        <h5>Follow us @ Instagram</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instagram Slides -->
        <div class="instagram-slides owl-carousel">
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/instagram-img/1.jpg" alt="">
                <!-- Hover Effects -->
                <div class="hover-effects">
                    <a href="#" data-toggle="tooltip" data-placement="bottom"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/instagram-img/2.jpg" alt="">
                <!-- Hover Effects -->
                <div class="hover-effects">
                    <a href="#" data-toggle="tooltip" data-placement="bottom"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/instagram-img/3.jpg" alt="">
                <!-- Hover Effects -->
                <div class="hover-effects">
                    <a href="#" data-toggle="tooltip" data-placement="bottom"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/instagram-img/4.jpg" alt="">
                <!-- Hover Effects -->
                <div class="hover-effects">
                    <a href="#" data-toggle="tooltip" data-placement="bottom"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/instagram-img/5.jpg" alt="">
                <!-- Hover Effects -->
                <div class="hover-effects">
                    <a href="#" data-toggle="tooltip" data-placement="bottom"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/instagram-img/6.jpg" alt="">
                <!-- Hover Effects -->
                <div class="hover-effects">
                    <a href="#" data-toggle="tooltip" data-placement="bottom"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Single Insta Feed -->
            <div class="single-insta-feed">
                <img src="img/instagram-img/7.jpg" alt="">
                <!-- Hover Effects -->
                <div class="hover-effects">
                    <a href="#" data-toggle="tooltip" data-placement="bottom"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
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
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
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