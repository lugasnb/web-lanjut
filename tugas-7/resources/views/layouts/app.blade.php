<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    :root {
        --primary-soft-gray: #3a3f4b;
        --primary-gray: #2f343f;
        --primary-dark-gray: #23272f;
        --light-gray: #ced4da;
        --dark-gray: #1c1f26;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--primary-dark-gray);
        color: var(--light-gray);
    }

    .navbar {
        background-color: var(--primary-soft-gray) !important;
    }

    .navbar-brand, .nav-link {
        color: var(--light-gray) !important;
    }

    .btn-primary {
        background-color: var(--primary-gray);
        border-color: var(--primary-gray);
        color: var(--light-gray);
    }

    .btn-primary:hover {
        background-color: var(--primary-soft-gray);
        border-color: var(--primary-soft-gray);
        color: var(--light-gray);
    }

    .card {
        background-color: var(--primary-gray);
        color: var(--light-gray);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        border: none;
    }

    .auth-card {
        max-width: 500px;
        margin: 0 auto;
    }

    .input-group-text {
        background-color: var(--primary-dark-gray);
        border-right: none;
        color: var(--light-gray);
    }

    .form-control {
        background-color: var(--primary-dark-gray);
        color: var(--light-gray);
        border-color: #444;
    }

    .form-control:focus {
        border-color: var(--primary-soft-gray);
        box-shadow: 0 0 0 0.2rem rgba(58, 63, 75, 0.4);
    }

    .text-primary {
        color: var(--light-gray) !important;
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animated {
        animation: fadeIn 0.5s ease-out;
    }
</style>



    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-lock me-2"></i>
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Add animation to all cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.classList.add('animated');
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>

    @stack('scripts')
</body>
</html>