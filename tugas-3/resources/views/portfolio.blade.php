@extends('layouts.app')

@section('title', 'My Portfolio')

@section('content')

<!-- Hero Section -->
<div class="hero-section bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fadeInUp">My Portfolio</h1>
        <p class="lead fadeInUp">
            Here are some of the projects I've worked on. Feel free to explore!
        </p>
    </div>
</div>

<!-- Portfolio Section -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fadeInUp">Featured Projects</h2>
        <p class="lead fadeInUp">A collection of my work showcasing various skills and expertise.</p>
    </div>

    <div class="row">
        <!-- Project 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow fadeInUp">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Project 1">
                <div class="card-body">
                    <h5 class="card-title">Web Development Project</h5>
                    <p class="card-text">A responsive website built with Laravel, showcasing my skills in web development.</p>
                    <a href="#" class="btn btn-primary">View Project</a>
                </div>
            </div>
        </div>
        <!-- Project 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow fadeInUp">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Project 2">
                <div class="card-body">
                    <h5 class="card-title">Mobile Application</h5>
                    <p class="card-text">A mobile app that helps users track their fitness goals, built with React Native.</p>
                    <a href="#" class="btn btn-primary">View Project</a>
                </div>
            </div>
        </div>
        <!-- Project 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow fadeInUp">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Project 3">
                <div class="card-body">
                    <h5 class="card-title">Digital Marketing Strategy</h5>
                    <p class="card-text">A digital marketing campaign I designed to boost business visibility and engagement online.</p>
                    <a href="#" class="btn btn-primary">View Project</a>
                </div>
            </div>
        </div>
    </div>

    <!-- More Projects Section -->
    <div class="text-center mt-5">
        <a href="/more-projects" class="btn btn-secondary btn-lg">View More Projects</a>
    </div>
</div>

@endsection
