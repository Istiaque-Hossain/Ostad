@extends('layouts.main')

@section('main')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <section>
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Laravel!</h1>
            <p class="lead">This is a simple example of a Laravel application with Bootstrap.</p>
            <hr class="my-4">
            <p>Start building amazing web applications with Laravel and Bootstrap.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a>
        </div>
    </section>
@endsection
