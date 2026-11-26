<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.assets')
    <title>@yield('title', config('portfolio.name').' | '.config('portfolio.role'))</title>
    <meta name="description" content="@yield('description', config('portfolio.tagline'))">
    <meta property="og:title" content="@yield('title', config('portfolio.name'))">
    <meta property="og:description" content="@yield('description', config('portfolio.tagline'))">
    @stack('head')
</head>
<body>

@php
    $onHome = request()->routeIs('home');
    $anchor = fn (string $id) => $onHome ? '#'.$id : route('home').'#'.$id;
@endphp

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <span class="text-gradient">{{ config('portfolio.name') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link" data-section="about" href="{{ $anchor('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" data-section="skills" href="{{ $anchor('skills') }}">Skills</a></li>
                <li class="nav-item"><a class="nav-link" data-section="experience" href="{{ $anchor('experience') }}">Education</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link" data-section="contact" href="{{ $anchor('contact') }}">Contact</a></li>
                <li class="nav-item ms-lg-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle" data-theme-toggle
                            aria-label="Toggle dark mode" style="width:38px;height:38px">
                        <i class="bi bi-moon-stars-fill"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="py-4 border-top">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 small text-body-secondary">
        <div>&copy; {{ date('Y') }} {{ config('portfolio.name') }}. All rights reserved.</div>
        <div class="d-flex gap-3 align-items-center">
            <a class="text-body-secondary text-decoration-none" href="{{ route('blog.index') }}">Blog</a>
            @auth
                <a class="text-body-secondary text-decoration-none" href="{{ route('admin.dashboard') }}">Admin</a>
            @else
                <a class="text-body-secondary text-decoration-none" href="{{ route('login') }}">Admin login</a>
            @endauth
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/site.js') }}"></script>
@stack('scripts')
</body>
</html>
