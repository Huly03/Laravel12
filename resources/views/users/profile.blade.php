<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="{{ $config->description }}">
  <meta name="keywords" content="{{ $config->keywords  }}">
  <title>Profile</title>

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
        :root {
      --primary-color: #1E3A8A;
      --secondary-color: #3B82F6;
      --accent-color: #10B981;
      --light-bg: #F8FAFC;
      --dark-text: #1F2937;
      --light-text: #6B7280;
      --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background-color: var(--light-bg);
      color: var(--dark-text);
    }

    /* Profile Container */
    .profile-container {
      max-width: 1000px;
      margin: 40px auto;
    }

    /* Profile Card */
    .profile-card {
      background: white;
      border-radius: 16px;
      box-shadow: var(--card-shadow);
      overflow: hidden;
    }

    /* Profile Header */
    .profile-header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      padding: 30px;
      color: white;
      text-align: center;
      position: relative;
    }

    .profile-avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 4px solid white;
      object-fit: cover;
      margin: 0 auto 15px;
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 48px;
      color: var(--primary-color);
    }

    .profile-name {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .profile-username {
      font-size: 16px;
      opacity: 0.9;
      margin-bottom: 0;
    }

    /* Profile Body */
    .profile-body {
      padding: 40px;
    }

    .section-title {
      font-size: 20px;
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 25px;
      position: relative;
      padding-bottom: 10px;
    }

    .section-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 3px;
      background: var(--accent-color);
    }

    /* Form Styles */
    .form-label {
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 8px;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px 15px;
      border: 1px solid #e0e0e0;
      transition: all 0.3s;
    }

    .form-control:focus {
      border-color: var(--secondary-color);
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    }

    .form-control[readonly] {
      background-color: #f8f9fa;
    }

    /* Button Styles */
    .btn-save {
      background: var(--primary-color);
      border: none;
      padding: 12px 30px;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s;
    }

    .btn-save:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3);
    }

    /* Alert Styles */
    .alert-success {
      background-color: #e6f4ea;
      color: #2e7d32;
      border-left: 4px solid #2e7d32;
      font-weight: 500;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .profile-container {
        margin: 20px auto;
      }
      
      .profile-body {
        padding: 25px;
      }
      
      .profile-name {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
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
    <div class="main-content" id="main-content">
    <div class="profile-container">
      <div class="profile-card">
        <!-- Profile Header -->
        <div class="profile-header">
          <div class="profile-avatar">
            @if($user->avatar)
              <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
            @else
              <i class="fas fa-user"></i>
            @endif
          </div>
          <h1 class="profile-name">{{ $user->fullname }}</h1>
          
        </div>

        <!-- Profile Body -->
        <div class="profile-body">
          @if (session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
          @endif

          <h3 class="section-title">Personal Information</h3>
          <form method="POST" action="{{ route('my.account.update') }}">
            @csrf

            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" name="fullname" id="fullname" class="form-control"
                  value="{{ old('fullname', $user->fullname) }}">
              </div>

              <div class="col-md-6 mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control"
                  value="{{ old('username', $user->username) }}" readonly>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" 
                  value="{{ old('email', $user->email) }}">
              </div>

              <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" 
                  value="{{ old('phone', $user->sdt) }}">
              </div>
            </div>

            <div class="mb-4">
              <label for="dia_chi" class="form-label">Address</label>
              <input type="text" name="dia_chi" id="dia_chi" class="form-control"
                value="{{ old('dia_chi', $user->dia_chi) }}">
            </div>

            <div class="text-center mt-5">
              <button type="submit" class="btn btn-save btn-primary">
                <i class="fas fa-save me-2"></i> Save Changes
              </button>
            </div>
          </form>
        </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Mặc định sidebar đóng và hiển thị nút "open"

  </script>
</body>

</html>