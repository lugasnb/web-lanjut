@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Hero Section -->
<div class="hero-section bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fadeInUp">Welcome to My Portfolio</h1>
        <p class="lead fadeInUp">
            My name is <strong>Lugas Nusa Bakti</strong><br>
            from <strong>Muhammadiyah Cirebon University</strong>.
        </p>
        <a href="/about" class="btn btn-light btn-lg mt-3 fadeInUp">About Me</a>
    </div>
</div>

<!-- Features Section -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fadeInUp">My Features</h2>
        <p class="lead fadeInUp">Explore the programming skills I’ve learned for my portfolio.</p>
    </div>
    <div class="row">
        <!-- Feature 1 -->
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow fadeInUp">
                <div class="card-body">
                    <i class="fas fa-laptop-code fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Web Development</h5>
                    <p class="card-text">I build responsive and user-friendly websites that deliver results.</p>
                </div>
            </div>
        </div>
        <!-- Feature 2 -->
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow fadeInUp">
                <div class="card-body">
                    <i class="fas fa-mobile-alt fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Mobile Solutions</h5>
                    <p class="card-text">I create mobile apps with seamless and intuitive user experiences.</p>
                </div>
            </div>
        </div>
        <!-- Feature 3 -->
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow fadeInUp">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Digital Marketing</h5>
                    <p class="card-text">I help businesses grow with effective digital marketing strategies.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
