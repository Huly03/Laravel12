<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $config->description }}">
    <meta name="keywords" content="{{ $config->keywords }}">
    <title>Architecture Style Recognition</title>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            /* Đảm bảo chiều cao đầy đủ để min-height của sidebar hoạt động */
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: ghostwhite;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            padding: 30px;
            background-color: ghostwhite;
            margin-left: 0;
            transition: margin-left 0.3s ease;
            flex: 1;
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

        .right-panel {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        #chatbox {
            box-sizing: border-box;
            height: 350px;
            overflow-y: auto;

            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: ghostwhite;

            width: 70%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chat-message.user {
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-end;
            text-align: right;
            display: flex;
            flex-direction: row-reverse;
        }

        .chat-message.bot {
            background-color: ghostwhite;
            color: black;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 75%;
            align-self: flex-start;
            text-align: left;
            display: flex;
            flex-direction: row;
        }

        .chat-message img {
            max-width: 100px;
            max-height: 100px;
            object-fit: contain;
            margin-left: 10px;
            margin-right: 10px;
        }

        #uploadForm {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .image-upload-label,
        .camera-upload-label,
        #sendChatBtn {
            border-radius: 12px;
            cursor: pointer;
            font-size: 24px;
            color: black;
            padding: 8px;
        }

        #chatInput {
            height: 40px;
            border: 1px solid white;
            border-radius: 24px;
            padding: 10px;
            background-color: white;
            font-size: 1rem;
            overflow-y: auto;
            white-space: pre-wrap;
            width: 100%;
        }

        #chatInput img {
            max-width: 40px;
            max-height: 40px;
            object-fit: contain;
            margin-left: -105px;
        }

        .panel-overlay {
            position: relative;
            width: 100%;
            max-width: 51rem;
            background-color: white;
            border-radius: 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: border-color 0.1s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 8px;
        }

        .panel-overlay:hover {
            border-color: #9ca3af;
        }

        .panel-overlay:focus-within {
            border-color: #9ca3af;
        }

        .panel-overlay:hover:focus-within {
            border-color: #9ca3af;
        }

        @media (min-width: 480px) {
            .panel-overlay {
                padding-left: 12px;
                padding-right: 12px;
            }
        }

        .icon-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 8px;
        }

        .card {
            transition: transform 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .list-unstyled li {
            padding: 0.25rem 0;
        }

        .upgrade-btn[disabled] {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .shadow-lg {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .upgrade-btn {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #000 !important;
            border: none;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .upgrade-btn:hover {
            background: linear-gradient(135deg, #c3cfe2 0%, #f5f7fa 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .upgrade-btn i {
            margin-right: 5px;
        }

        @media (min-width: 1200px) {
            .modal-xl {
                max-width: 1140px;
            }
        }

        .contact-info h6 {
            color: #444;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .contact-info p {
            margin-top: 8px;
            color: #666;
        }

        .business-hours {
            border-left: 3px solid #dc3545;
        }

        #paymentModal .modal-body {
            text-align: center;
        }

        #paymentModal .card {
            border-left: 3px solid #0d6efd;
        }

        .modal {
            z-index: 1060;
            /* Đảm bảo modal hiển thị trên các phần tử khác */
        }

        .modal-backdrop {
            z-index: 1050;
            /* Đảm bảo backdrop hiển thị đúng */
        }

        /* Đảm bảo các nút đóng modal hiển thị rõ ràng */
        .btn-close {
            filter: invert(1);
            /* Làm cho icon X trắng trên nền tối */
        }
    </style>
</head>

<body>
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Payment Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <div class="alert alert-info mb-4">
                        <i class="fas fa-info-circle me-2"></i>Please scan the QR code or transfer using the information
                        below
                    </div>

                    <!-- QR Code Image - Sẽ thay đổi tùy theo plan -->
                    <div class="mb-4">
                        <img id="qrCodeImage" src="" alt="Payment QR Code" class="img-fluid" style="max-width: 250px;">
                        <p class="mt-2 text-muted">Scan this QR code with your banking app</p>
                    </div>

                    <!-- Payment Information -->
                    <div class="card bg-light p-3 mb-3">
                        <h6 class="fw-bold">Bank Transfer Information</h6>
                        <div class="text-start">
                            <p><strong>Amount:</strong> <span id="paymentAmount">99,000đ</span></p>
                            <p><strong>Payment Content:</strong> <span
                                    id="paymentContent">UPGRADE_PRO_[YOUR_USERNAME]</span></p>
                        </div>
                    </div>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-circle me-2"></i>Please include the exact payment content for
                        verification
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmPaymentBtn">
                        <i class="fas fa-check-circle me-2"></i>I've Completed Payment
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Contact Us</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info mb-4">
                                <h6 class="fw-bold"><i class="fas fa-building me-2"></i>Company</h6>
                                <p>{{ $config->business_info ?? 'Your Company Name' }}</p>
                            </div>

                            <div class="contact-info mb-4">
                                <h6 class="fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Address</h6>
                                <p>{{ $config->address ?? 'Your Company Address' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="contact-info mb-4">
                                <h6 class="fw-bold"><i class="fas fa-phone-alt me-2"></i>Phone</h6>
                                <p><a href="tel:{{ $config->contact_phone ?? '0123456789' }}"
                                        class="text-decoration-none">{{ $config->contact_phone ?? '0123 456 789' }}</a>
                                </p>
                            </div>

                            <div class="contact-info mb-4">
                                <h6 class="fw-bold"><i class="fas fa-envelope me-2"></i>Email</h6>
                                <p><a href="mailto:{{ $config->contact_email ?? 'contact@example.com' }}"
                                        class="text-decoration-none">{{ $config->contact_email ?? 'contact@example.com'
                                        }}</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="business-hours mt-4 p-3 bg-light rounded">
                        <h6 class="fw-bold"><i class="fas fa-clock me-2"></i>Working Hours</h6>
                        <p>Monday - Friday: 8:00 AM - 5:00 PM</p>
                        <p>Saturday: 9:00 AM - 12:00 PM</p>
                        <p>Sunday: Closed</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="mailto:{{ $config->contact_email ?? 'contact@example.com' }}" class="btn btn-danger">
                        <i class="fas fa-envelope me-2"></i>Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upgrade -->
    <div class="modal fade" id="upgradeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Upgrade Your Account</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="alert alert-info mb-4" id="upgradeMessage">
                        <i class="fas fa-star me-2"></i>Upgrade to unlock premium features and higher usage limits!
                    </div>

                    <div class="row g-4 pricing-plans">
                        <!-- Trial Plan -->
                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card h-100 plan-card">
                                <div class="card-header bg-light text-center py-3">
                                    <h4 class="my-1 plan-title">Trial</h4>
                                    <span class="badge bg-primary" style="display: none;">Level 2</span>
                                </div>
                                <div class="card-body py-4">
                                    <div class="text-center mb-4">
                                        <span class="display-5 fw-bold text-primary">Free</span>
                                    </div>
                                    <ul class="list-unstyled plan-features">
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>5 images
                                        </li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Basic
                                            features</li>
                                        <li class="mb-2 text-muted"><i
                                                class="fas fa-times-circle text-muted me-2"></i>No support</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 text-center py-3">
                                    <button class="btn btn-outline-primary w-100 upgrade-btn" data-level="2" disabled>
                                        <i class="fas fa-check-circle me-2"></i>Current Plan
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Plan -->
                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card h-100 plan-card border-success">
                                <div class="card-header bg-light text-center py-3">
                                    <h4 class="my-1 plan-title">Basic</h4>
                                    <span class="badge bg-success" style="display: none;">Level 3</span>
                                </div>
                                <div class="card-body py-4">
                                    <div class="text-center mb-4">
                                        <span class="display-5 fw-bold text-success">49,000đ</span>
                                        <span class="text-muted d-block">/month</span>
                                    </div>
                                    <ul class="list-unstyled plan-features">
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>50
                                            images/month</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>+10 free
                                            images</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Basic
                                            support</li>
                                        <li class="mb-2 text-muted"><i
                                                class="fas fa-times-circle text-muted me-2"></i>No reports</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 text-center py-3">
                                    <button class="btn btn-success w-100 upgrade-btn" data-level="3"
                                        data-qr="{{ asset('img/bg-img/49.jpg') }}" data-bs-toggle="modal"
                                        data-bs-target="#paymentModal">
                                        <i class="fas fa-arrow-up me-2"></i>Upgrade
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Pro Plan (Featured) -->
                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card h-100 plan-card border-warning shadow featured-plan">
                                <div class="card-header bg-warning text-white text-center py-3 position-relative">
                                    <h4 class="my-1 plan-title">Pro</h4>
                                    <span class="badge bg-white text-warning" style="display: none;">Level 4</span>
                                    <span class="position-absolute badge rounded-pill bg-danger"
                                        style="top: 10px; left: 10px;">
                                        Best Value
                                    </span>
                                </div>
                                <div class="card-body py-4">
                                    <div class="text-center mb-4">
                                        <span class="display-5 fw-bold text-warning">99,000đ</span>
                                        <span class="text-muted d-block">/month</span>
                                        <small class="text-success">First month FREE</small>
                                    </div>
                                    <ul class="list-unstyled plan-features">
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Unlimited
                                            images</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Export
                                            reports</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Priority
                                            support</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>All
                                            features</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 text-center py-3">
                                    <button class="btn btn-warning text-white w-100 upgrade-btn" data-level="4"
                                        data-qr="{{ asset('img/bg-img/99.jpg') }}" data-bs-toggle="modal"
                                        data-bs-target="#paymentModal">
                                        <i class="fas fa-crown me-2"></i>Go Pro
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Enterprise Plan -->
                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card h-100 plan-card border-danger">
                                <div class="card-header bg-light text-center py-3">
                                    <h4 class="my-1 plan-title">Enterprise</h4>
                                    <span class="badge bg-danger" style="display: none;">Level 5</span>
                                </div>
                                <div class="card-body py-4">
                                    <div class="text-center mb-4">
                                        <span class="display-5 fw-bold text-danger">Custom</span>
                                        <span class="text-muted d-block">Volume pricing</span>
                                    </div>
                                    <ul class="list-unstyled plan-features">
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>API Access
                                        </li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Dedicated
                                            support</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Free demo
                                        </li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>All Pro
                                            features</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 text-center py-3">
                                    <button class="btn btn-danger w-100 upgrade-btn" data-level="5"
                                        data-bs-toggle="modal" data-bs-target="#contactModal">
                                        <i class="fas fa-headset me-2"></i>Contact Us
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <a href="#" class="btn upgrade-btn" data-bs-toggle="modal" data-bs-target="#upgradeModal">
                                <i class="fas fa-crown"></i> Upgrade
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
    <div class="main-content" id="main-content">
        <button class="toggle-btn open-btn" id="open-btn" style="display: none;">
            <i class="fas fa-bars"></i>
        </button>
        <button class="toggle-btn close-btn" id="close-btn" style="display: none;">
            <i class="fas fa-times"></i>
        </button>
        <div class="container">
            <div class="right-panel">
                <div id="chatbox"></div>
                <form id="uploadForm" action="{{ route('uploadImage', ['id' => $user_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="panel-overlay">
                        <div id="chatInput" contenteditable="true" class="form-control" placeholder="Nhập câu hỏi...">
                        </div>
                        <div class="icon-group">
                            <label for="image" class="image-upload-label">
                                <i class="fas fa-image"></i>
                            </label>
                            <input type="file" name="image" id="image" required style="display:none;"
                                onchange="handleImageUpload()">
                            <button id="sendChatBtn" class="chat-btn" onclick="handleSendChat()">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <video id="video" width="300" height="200" style="display:none;" autoplay></video>
                <canvas id="canvas" style="display:none;"></canvas>
            </div>
        </div>
    </div>

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

        document.getElementById('cameraBtn')?.addEventListener('click', function () {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        document.getElementById('video').style.display = 'block';
                        document.getElementById('video').srcObject = stream;
                        document.getElementById('video').addEventListener('click', function () {
                            takeSnapshot();
                        });
                    })
                    .catch(function (error) {
                        console.error("Lỗi khi mở camera: ", error);
                        alert("Không thể mở camera. Vui lòng cấp quyền truy cập!");
                    });
            } else {
                alert("Trình duyệt của bạn không hỗ trợ camera.");
            }
        });

        $('#uploadForm').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '{{ route("uploadImage", ["id" => $user_id]) }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("Response from server: ", response);
                    if (response.result) {
                        const top1 = response.result.top_5_labels[0];
                        sendToChatbot(top1);
                    } else {
                        alert('Không có kết quả nhận diện hợp lệ');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Upload error:", error);
                    alert('Lỗi khi nhận diện hình ảnh: ' + error);
                }
            });
        });

        function sendToChatbot(top1) {
            $('#chatbox').append('<div class="chat-message bot">Phong cách kiến trúc nhận diện: ' + top1 + '</div>');
            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);

            $.ajax({
                url: 'http://127.0.0.1:5000/api/chatbot',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    "user_input": "Thông tin về phong cách kiến trúc " + top1,
                    "language": "vi"
                }),
                success: function (chatbotResponse) {
                    console.log("Chatbot response:", chatbotResponse);
                    $('#chatbox').append('<div class="chat-message bot">' + chatbotResponse.response + '</div>');
                    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
                }
            });
        }

        $('#sendChatBtn').on('click', function (event) {
            event.preventDefault();
            var userMessage = $('#chatInput').text().trim();
            var hasImage = $('#chatInput img').length > 0;
            var userId = {{ auth()->check() ? auth()->user()->id : 0 }};
            var userLevel = {{ auth()->check() ? auth()->user()->level : 2 }};

            // Kiểm tra giới hạn trước khi xử lý
            if (hasImage && userLevel < 4) {
                if (checkUploadLimit(userLevel, userId)) {
                    return;
                }
            }

            if (userMessage !== "" || hasImage) {
                if (userMessage !== "") {
                    $('#chatbox').append('<div class="chat-message user">' + userMessage + '</div>');
                    $('#chatInput').text('');

                    $.ajax({
                        url: 'http://127.0.0.1:5000/api/chatbot',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({ "user_input": userMessage, "language": "vi" }),
                        success: function (response) {
                            $('#chatbox').append('<div class="chat-message bot">' + response.response + '</div>');
                            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error:", error);
                            alert('Lỗi khi gửi thông tin vào chatbot: ' + error);
                        }
                    });
                }

                if (hasImage) {
                    var imageElement = $('#chatInput img');
                    var imageSrc = imageElement.attr('src');
                    imageElement.remove();
                    $('#chatbox').append('<div class="chat-message user"><img src="' + imageSrc + '" alt="User Image"></div>');

                    // Cập nhật số lượt upload
                    if (userLevel < 4) {
                        updateUploadCount(userLevel, userId);
                        updateUploadCounter();
                    }

                    var formData = new FormData($('#uploadForm')[0]);
                    $.ajax({
                        url: '{{ route("uploadImage", ["id" => $user_id]) }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            console.log("Response from server:", response);
                            if (response.result) {
                                const top1 = response.result.top_5_labels[0];
                                sendToChatbot(top1);
                            } else {
                                alert('Không có kết quả nhận diện hợp lệ');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Upload error:", error);
                            alert('Lỗi khi nhận diện hình ảnh: ' + error);
                        }
                    });
                }
            } else {
                alert('Vui lòng nhập tin nhắn hoặc chọn ảnh.');
            }
        });

        // Hàm kiểm tra giới hạn
        function checkUploadLimit(userLevel, userId) {
            if (userLevel === 2) {
                const uploadCount = localStorage.getItem(`user_${userId}_lifetime_upload_count`) || 0;
                if (uploadCount >= 5) {
                    $('#upgradeMessage').html('You have used all 5 free uploads. Upgrade to Basic for 50 uploads per month!');
                    $('#upgradeModal').modal('show');
                    return true;
                }
            }
            else if (userLevel === 3) {
                const currentMonth = new Date().getMonth();
                const uploadCount = localStorage.getItem(`user_${userId}_monthly_upload_count_${currentMonth}`) || 0;
                if (uploadCount >= 50) {
                    $('#upgradeMessage').html('You have reached the 50 uploads/month limit. Upgrade to Pro for unlimited uploads!');
                    $('#upgradeModal').modal('show');
                    return true;
                }
            }
            return false;
        }

        // Hàm cập nhật số lượt upload
        function updateUploadCount(userLevel, userId) {
            if (userLevel === 2) {
                const count = (parseInt(localStorage.getItem(`user_${userId}_lifetime_upload_count`)) || 0) + 1;
                localStorage.setItem(`user_${userId}_lifetime_upload_count`, count);
            }
            else if (userLevel === 3) {
                const currentMonth = new Date().getMonth();
                const count = (parseInt(localStorage.getItem(`user_${userId}_monthly_upload_count_${currentMonth}`)) || 0) + 1;
                localStorage.setItem(`user_${userId}_monthly_upload_count_${currentMonth}`, count);
            }
        }

        // Hàm hiển thị lượt upload còn lại
        function updateUploadCounter() {
            const userId = {{ auth()->check() ? auth()->user()->id : 0 }};
            const userLevel = {{ auth()->check() ? auth()->user()->level : 2 }};

            if (userLevel === 4) {
                $('#uploadCounter').text('Unlimited uploads for this account');
                return;
            }

            let message = '';
            if (userLevel === 2) {
                const uploadCount = localStorage.getItem(`user_${userId}_lifetime_upload_count`) || 0;
                message = `Remaining uploads: ${5 - uploadCount}/5 Free`;
            }
            else if (userLevel === 3) {
                const currentMonth = new Date().getMonth();
                const uploadCount = localStorage.getItem(`user_${userId}_monthly_upload_count_${currentMonth}`) || 0;
                message = `Monthly uploads remaining: ${50 - uploadCount}/50`;
            }


            $('#uploadCounter').text(message);
        }

        // Khởi tạo counter khi tải trang
        $(document).ready(function () {
            // Kiểm tra và reset counter tháng nếu cần
            const lastStoredMonth = localStorage.getItem('current_month');
            const currentMonth = new Date().getMonth();

            if (lastStoredMonth !== currentMonth.toString()) {
                // Xóa các counter cũ của tháng trước
                Object.keys(localStorage).forEach(key => {
                    if (key.includes('_monthly_upload_count_')) {
                        localStorage.removeItem(key);
                    }
                });
                localStorage.setItem('current_month', currentMonth);
            }

            $('#chatbox').before('<div id="uploadCounter" class="text-end mb-2"></div>');
            updateUploadCounter();
        });
        $('#searchBtn').on('click', function () {
            var query = $('#searchInput.form-control').val().trim();
            console.log("Query entered: " + query);

            if (query !== "") {
                console.log("Sending query:", query);
                $.ajax({
                    url: 'http://127.0.0.1:5000/search',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ query: query }),
                    success: function (response) {
                        console.log("Response from Flask API:", response);
                        if (response.matched_articles && response.matched_articles.length > 0) {
                            $('#chatbox').empty();
                            response.matched_articles.forEach(function (article) {
                                $('#chatbox').append('<div class="chat-message bot">' + article.description + '</div>');
                            });
                        } else {
                            $('#chatbox').append('<div class="chat-message bot">Không tìm thấy bài báo nào phù hợp.</div>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error sending request to Flask:', error);
                        alert('Đã có lỗi xảy ra khi tìm kiếm: ' + error);
                    }
                });
            } else {
                console.log("Query is empty or contains only spaces.");
                alert('Vui lòng nhập từ khóa tìm kiếm.');
            }
        });

        $('#image').on('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Image Preview";
                    const chatInput = document.getElementById('chatInput');
                    chatInput.appendChild(img);
                    chatInput.scrollTop = chatInput.scrollHeight;
                }
                reader.readAsDataURL(file);
            }
        });

        function takeSnapshot() {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageDataUrl = canvas.toDataURL('image/jpeg');
            fetch(imageDataUrl)
                .then(res => res.blob())
                .then(blob => {
                    const imgUrl = URL.createObjectURL(blob);
                    video.style.display = 'none';
                    const stream = video.srcObject;
                    const tracks = stream.getTracks();
                    tracks.forEach(function (track) {
                        track.stop();
                    });
                    const chatInput = document.getElementById('chatInput');
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    chatInput.innerHTML = '';
                    chatInput.appendChild(img);
                })
                .catch(error => console.error('Lỗi khi tạo Blob từ Data URL:', error));
        }
    </script>
    <script>
        const currentUserLevel = {{ $currentLevel ?? 2 }};
        document.addEventListener('DOMContentLoaded', function () {
            // Disable current level and lower levels
            document.querySelectorAll('.upgrade-btn').forEach(btn => {
                const btnLevel = parseInt(btn.dataset.level);

                if (btnLevel < currentUserLevel) {
                    btn.disabled = true;
                    btn.classList.remove('btn-success', 'btn-warning', 'btn-danger');
                    btn.classList.add('btn-outline-secondary');
                    btn.textContent = 'Used';
                } else if (btnLevel === currentUserLevel) {
                    btn.disabled = true;
                    btn.textContent = 'In use';
                }
            });

            // Set upgrade message based on current level
            const messages = {
                2: "You are currently using the Free Trial plan. Upgrade to access more features!",
                3: "You are currently using the Basic plan. Upgrade to Pro for unlimited image recognition!",
                4: "You are currently using the Pro plan. Upgrade to Enterprise to integrate with our API!",
                5: "You are using the highest-tier plan!"
            };

            document.getElementById('upgradeMessage').textContent = messages[currentUserLevel] ||
                "Upgrade your account to unlock more features and increase usage limits!";

        });
        // Thêm vào phần script
        // document.addEventListener('DOMContentLoaded', function () {
        //     // Kiểm tra nếu user chưa phải level cao nhất
        //     if (currentUserLevel < 5) {
        //         const upgradeBtn = document.querySelector('.upgrade-btn');
        //         if (upgradeBtn) {
        //             const badge = document.createElement('span');
        //             badge.className = 'position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger';
        //             badge.textContent = 'Hot';
        //             badge.style.fontSize = '0.6rem';
        //             upgradeBtn.style.position = 'relative';
        //             upgradeBtn.appendChild(badge);
        //         }
        //     }
        // });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Khởi tạo các modal
            const upgradeModal = new bootstrap.Modal(document.getElementById('upgradeModal'));
            const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            const contactModal = new bootstrap.Modal(document.getElementById('contactModal'));

            // Xử lý sự kiện cho các nút nâng cấp
            document.querySelectorAll('.upgrade-btn').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const level = this.getAttribute('data-level');

                    if (level === '3' || level === '4') {
                        // Cập nhật thông tin thanh toán
                        const planName = this.closest('.plan-card').querySelector('.plan-title').textContent.trim();
                        const qrCode = this.getAttribute('data-qr');

                        document.getElementById('paymentAmount').textContent =
                            level === '3' ? '49,000đ' : '99,000đ';
                        document.getElementById('paymentContent').textContent =
                            `UPGRADE_${planName.toUpperCase()}_[EMAIL]_[USERNAME]_[PHONE]`;
                        document.getElementById('qrCodeImage').src = qrCode;

                        // Đóng modal upgrade trước khi mở modal payment
                        upgradeModal.hide();
                        paymentModal.show();
                    } else if (level === '5') {
                        // Đóng modal upgrade trước khi mở modal contact
                        upgradeModal.hide();
                        contactModal.show();
                    }
                });
            });

            // Xử lý xác nhận thanh toán
            document.getElementById('confirmPaymentBtn').addEventListener('click', function (e) {
                e.preventDefault();
                alert('Cảm ơn bạn đã thanh toán! Chúng tôi sẽ xác minh và nâng cấp tài khoản của bạn sớm.');
                paymentModal.hide();
            });

            // Hàm đóng tất cả modal và xóa backdrop
            function closeAllModals() {
                paymentModal.hide();
                contactModal.hide();
                upgradeModal.hide();
                removeModalBackdrop();
            }

            // Hàm xóa modal backdrop
            function removeModalBackdrop() {
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => backdrop.remove());
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            }

            // Gắn sự kiện close cho tất cả nút close modal
            document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    closeAllModals();
                });
            });

            // Gắn sự kiện khi bấm ra ngoài modal để đóng
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        closeAllModals();
                    }
                });
            });
        });
        function closeAllModals() {
            paymentModal.hide();
            contactModal.hide();
            // Không đóng upgradeModal ở đây nếu muốn giữ lại
            removeModalBackdrop();

            // Chỉ show lại upgradeModal nếu nó đã được mở trước đó
            if (upgradeModalShown) {
                upgradeModal.show();
            }
        }
    </script>
</body>

</html>