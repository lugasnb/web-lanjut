<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            background-color: #e9f7fa; /* Soft background color */
            font-family: 'Open Sans', sans-serif;
            margin-top: 70px;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #00bcd4; /* Soft cyan */
            box-shadow: 0 4px 10px rgba(0, 188, 212, 0.2); /* Subtle shadow */
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
            font-family: 'Raleway', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #004d5b !important;
        }

        .navbar-nav .nav-item {
            padding-right: 15px;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        /* Content Area */
        .content {
            background-color: #ffffff; /* White background for content */
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0, 188, 212, 0.1);
            margin-top: 30px;
            opacity: 0;
        }

        /* Animasi Fade-In */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }

        /* Footer Styles */
        footer {
            background-color: #00bcd4;
            color: #ffffff;
            padding: 30px 0;
            text-align: center;
            font-size: 14px;
            box-shadow: 0 -2px 10px rgba(0, 188, 212, 0.3);
        }

        footer a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
        }

        footer a:hover {
            color: #004d5b;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .navbar {
                padding: 10px 0;
            }

            footer {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="content fade-in">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            <p><a href="{{ url('/privacy') }}">Privacy Policy</a> | <a href="{{ url('/terms') }}">Terms of Service</a></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const content = document.querySelector('.content');
            content.classList.add('fade-in');
        });
    </script>
</body>
</html>
