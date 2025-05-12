<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ArchStyAi</title>

    <!-- Favicon -->
    @if(!empty($config->favicon))
        <link rel="icon" href="{{ asset('storage/' . $config->favicon) }}" type="image/x-icon">
    @endif

    <!-- Style CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        /* Thêm vào phần style của bạn */
        .architecture-caption {
            padding: 15px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            text-align: center;
            border-radius: 0 0 5px 5px;
        }

        .carousel-item {
            margin-bottom: 50px; /* Tạo khoảng cách cho caption */
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
    <!-- Header Area -->
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
                        <div class="subscribe-btn">

                            <a href="#" class="btn subscribe-btn"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
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
                                    <li><a href="/user">Home</a></li>
                                    
                                    <li>
                                        @if(session('user_id'))
                                            <a
                                                href="{{ route('uploadImage', parameters: ['id' => session('user_id')]) }}">Recogintion</a>
                                        @else
                                            <a href="#">Recogintion (login)</a>
                                        @endif
                                    </li>
                                    <li><a href="{{ route('my.account') }}"> Profile</a></li>
                                    <li><a href="{{ route('images.index') }}">Results</a></li>
                                </ul>


                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Single Blog Area -->
    <div class="single-blog-wrapper section-padding-0-100">
        <!-- Single Blog Area -->
        <div class="single-blog-area blog-style-2 mb-50">
            <div class="single-blog-thumbnail">
                <img src="img/bg-img/76.jpg" alt="Post Image">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Post Content Area -->
                <div class="col-12 col-lg-9">
                    <!-- Single Blog Area -->
                    <div class="single-blog-area blog-style-2 mb-50">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">ArchStyAi</a>
                            <h4><a href="#" class="post-headline mb-0">Architecture Style Recogintion</a></h4>
                            <div class="post-meta mb-50">
                                <p>By <a href="#">Huy Ly</a></p>
                                <p>2025</p>
                            </div>
                            <p>Welcome to our AI-based architecture style recognition website! We offer a powerful tool that accurately and quickly identifies and classifies architectural styles from images. With advanced AI technology, you can easily explore unique architectural styles from around the world with just a few clicks.</p> <p>Our website is not just a tool for recognizing architectural styles; it also features a friendly virtual assistant (chatbot). The chatbot answers all your questions about architectural styles, explains the details of each style, and helps you dive deeper into the history and characteristics of various architectural designs.</p> 
                            <p>With our easy-to-use platform, all you need to do is upload an image of an architectural structure, and let the AI do the rest. The system will analyze the image and identify the architectural style the building belongs to. You can also interact directly with the chatbot to learn more about each style, from classic to modern, and many other unique styles.</p> 
                            <p>Explore and experience our intelligent architectural style recognition technology today. We are committed to providing you with accurate and easy-to-understand information, making it easier for you to appreciate and explore architectural styles from around the world.</p>
                        </div>
                    </div>
                    <!-- Leave a Reply Form -->
                    <div class="post-a-comment-area mt-70">
                        <h5>Feedback!</h5>
                        <form action="#" method="post">
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
                                        <textarea name="message" id="message" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn original-btn">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="post-sidebar-area">


                        <!-- Advertisement Widget -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Architectures</h5>
                            <div id="architectureCarousel" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="3000">
                                <div class="carousel-inner">
                                    @foreach ($architectures as $index => $architecture)
                                        <div class="carousel-item @if($index == 0) active @endif">
                                            <!-- Hiển thị ảnh từ CSDL -->
                                            <img src="{{ asset('storage/' . $architecture->image_url) }}"
                                                class="d-block w-100" alt="{{ $architecture->name }}">
                                                <div class="architecture-caption">
                                                    <h5>{{ $architecture->name }}</h5>
                                                    <p>{{ $architecture->description }}</p>
                                                </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Các nút điều khiển -->
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#architectureCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#architectureCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area -->
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