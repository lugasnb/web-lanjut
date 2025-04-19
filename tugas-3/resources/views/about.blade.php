@extends('layouts.app')

@section('title', 'About Me')

@section('content')

<!-- Hero Section -->
<div class="hero-section bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fadeInUp">About Me</h1>
        <p class="lead fadeInUp">
            Hello! I’m <strong>Lugas Nusa Bakti</strong>, a passionate developer from <strong>Muhammadiyah Cirebon University</strong>.
        </p>
    </div>
</div>

<!-- About Section -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fadeInUp">Who Am I?</h2>
        <p class="lead fadeInUp">
            I am a web developer, mobile app creator, and digital marketing enthusiast, passionate about creating solutions that make an impact.
        </p>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow fadeInUp">
                <div class="card-body">
                    <h5 class="card-title">My Journey</h5>
                    <p class="card-text">Starting my journey in tech at Muhammadiyah Cirebon University, I’ve developed skills in web development, mobile applications, and digital marketing. I love tackling challenges and always strive to learn and grow.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow fadeInUp">
                <div class="card-body">
                    <h5 class="card-title">My Goals</h5>
                    <p class="card-text">My goal is to continue building amazing projects and providing innovative solutions for businesses and users alike. I aim to combine my technical skills with creativity to deliver the best experiences.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fadeInUp">Get In Touch</h2>
        <p class="lead fadeInUp">I would love to connect with you! Feel free to reach out for collaboration, questions, or just to chat about tech.</p>
        <a href="mailto:lugas@example.com" class="btn btn-primary btn-lg mt-3 fadeInUp">Contact Me</a>
    </div>
</div>

@endsection
