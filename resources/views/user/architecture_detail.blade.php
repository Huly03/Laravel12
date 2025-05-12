<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">
    <title>Chi tiết phong cách kiến trúc {{ $architecture->name }}</title>

    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/classy-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Main content styles */
        .main-content {
        padding: 40px 0;
        background-color: #f8f9fa;
        min-height: calc(100vh - 300px);
    }

    .article-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .article-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        line-height: 1.3;
    }

    .article-meta {
        color: #7f8c8d;
        font-size: 0.9rem;
        margin-bottom: 30px;
    }

    .featured-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .article-content {
        line-height: 1.8;
        font-size: 1.1rem;
        color: #34495e;
    }

    .article-content h2, 
    .article-content h3, 
    .article-content h4 {
        margin-top: 40px;
        margin-bottom: 20px;
        color: #2c3e50;
        font-weight: 600;
    }

    .article-content h2 {
        font-size: 1.8rem;
        border-bottom: 2px solid #f1f1f1;
        padding-bottom: 10px;
    }

    .article-content h3 {
        font-size: 1.5rem;
    }

    .article-content h4 {
        font-size: 1.3rem;
    }

    .article-content p {
        margin-bottom: 25px;
    }

    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 6px;
        margin: 30px 0;
        box-shadow: 0 3px 5px rgba(0,0,0,0.1);
    }

    .article-content blockquote {
        border-left: 4px solid #3498db;
        background: #f8f9fa;
        padding: 20px;
        margin: 30px 0;
        font-style: italic;
        color: #555;
    }

    .article-content ul,
    .article-content ol {
        margin-bottom: 25px;
        padding-left: 20px;
    }

    .article-content li {
        margin-bottom: 10px;
    }

    .back-button {
        display: inline-block;
        margin-top: 40px;
        padding: 10px 20px;
        background: #3498db;
        color: white;
        border-radius: 4px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .back-button:hover {
        background: #2980b9;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .article-container {
            padding: 25px;
        }
        
        .article-title {
            font-size: 2rem;
        }
        
        .featured-image {
            height: 250px;
        }
        
        .article-content {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .article-container {
            padding: 20px;
        }
        
        .article-title {
            font-size: 1.8rem;
        }
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
            margin-top: 100px;
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
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>
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
                                    <li><a href="{{ Auth::check() ? route('my.account') : route('login') }}">
                                            Hello {{ Auth::check() ? Auth::user()->fullname : 'Guest' }}
                                        </a></li>
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
                        <a class="original-logo" href="/user">
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
                            <a href="/login" class="btn auth-btn login-btn">Login</a>
                            <a href="/register" class="btn auth-btn register-btn">Register</a>
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

    <!-- Content -->
    <!-- Content -->
<div class="main-content" id="main-content">
    <div class="article-container">
        <div class="article-header">
            <h1 class="article-title">{{ $architecture->name }}</h1>
            <div class="article-meta">
                <span>Architecture</span>
            </div>
            <img src="{{ asset('storage/' . $architecture->image_url) }}" class="featured-image" alt="{{ $architecture->name }}">
        </div>

        <div class="article-content">
            <h2>Brief description</h2>
            <p>{{ $architecture->description }}</p>

            <h2>Description</h2>
            @if($textContent)
                @foreach(explode("\n", $textContent) as $paragraph)
                    @if(trim($paragraph) != '')
                        @if(str_starts_with(trim($paragraph), '##'))
                            <h3>{{ str_replace('##', '', trim($paragraph)) }}</h3>
                        @elseif(str_starts_with(trim($paragraph), '###'))
                            <h4>{{ str_replace('###', '', trim($paragraph)) }}</h4>
                        @else
                            <p>{{ trim($paragraph) }}</p>
                        @endif
                    @endif
                @endforeach
            @else
                <p>Oops! Something’s not working. Refresh the page or try again soon.</p>
            @endif

            <a href="/user/architectures/view" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>

    <!-- Footer -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <!-- Script toggle sidebar -->
    <script>
        let sidebarOpen = false;

        document.getElementById('open-btn').addEventListener('click', function () {
            sidebarOpen = true;
            document.getElementById('sidebar').style.left = '0';
            document.getElementById('main-content').style.marginLeft = '250px';
            document.getElementById('open-btn').style.display = 'none';
            document.getElementById('close-btn').style.display = 'block';
        });

        document.getElementById('close-btn').addEventListener('click', function () {
            sidebarOpen = false;
            document.getElementById('sidebar').style.left = '-250px';
            document.getElementById('main-content').style.marginLeft = '0';
            document.getElementById('open-btn').style.display = 'block';
            document.getElementById('close-btn').style.display = 'none';
        });
    </script>
</body>

</html>