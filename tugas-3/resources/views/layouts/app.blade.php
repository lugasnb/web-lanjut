<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portofolio' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1e1e1e;
            color: #e0e0e0;
            margin-top: 80px;
        }

        /* Navbar */
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #2c2c2c;
        }

        .navbar.scrolled {
            background-color: #1c1c1c !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            position: relative;
            color: #cccccc;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #888;
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #2c2c2c, #1e1e1e);
            padding: 100px 0;
            color: #e0e0e0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 600;
            animation: fadeIn 1s ease-in-out;
        }

        .hero-section p {
            font-size: 1.2rem;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Cards */
        .card {
            background-color: #2b2b2b;
            border: none;
            color: #e0e0e0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .card-body i {
            font-size: 2.5rem;
            color: #aaa;
            transition: transform 0.3s ease;
        }

        .card:hover .card-body i {
            transform: scale(1.1);
        }

        /* Buttons */
        .btn-primary {
            background-color: #444;
            color: #fff;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #666;
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background-color: #2c2c2c;
            color: #ccc;
            padding: 30px 0;
            text-align: center;
        }

        footer a {
            color: #999;
            text-decoration: none;
        }

        footer a:hover {
            color: #fff;
            text-decoration: underline;
        }

        /* Responsive Text */
        @media (max-width: 767px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="/"><strong>MyPortfolio</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3"><a class="nav-link" href="{{asset ('/')}}">Home</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{asset ('/about')}}">About</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{asset ('/contact')}}">Contact</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{asset ('/portfolio')}}">Portfolio</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} <strong>Lugas Nusa Bakti</strong> || 220511040. All rights reserved. | <a href="#">Privacy Policy</a></p>
        </div>
    </footer>

    <!-- Navbar scroll effect -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
