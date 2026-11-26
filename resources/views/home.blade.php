@extends('layouts.app')

@section('content')
@php
    $p = config('portfolio');
    $socialIcons = ['github' => 'bi-github', 'linkedin' => 'bi-linkedin', 'facebook' => 'bi-facebook', 'twitter' => 'bi-twitter-x'];
@endphp

{{-- ============ HERO ============ --}}
<section id="home" class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7 order-2 order-lg-1 text-center text-lg-start">
                <span class="badge rounded-pill text-bg-primary-subtle text-primary-emphasis px-3 py-2 mb-3">
                    <i class="bi bi-stars me-1"></i> Open to job &amp; freelance opportunities
                </span>
                <h1 class="display-4 fw-bolder mb-3">
                    Hi, I'm <span class="text-gradient">{{ $p['name'] }}</span>
                </h1>
                <h2 class="h3 text-body-secondary fw-semibold mb-3">{{ $p['role'] }}</h2>
                <p class="lead text-body-secondary mb-4">{{ $p['tagline'] }}</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start mb-4">
                    <a href="{{ route('projects') }}" class="btn btn-brand btn-lg px-4">View my work</a>
                    <a href="#contact" class="btn btn-outline-secondary btn-lg px-4">Contact me</a>
                    @if ($p['resume_url'])
                        <a href="{{ $p['resume_url'] }}" class="btn btn-link btn-lg" download>
                            <i class="bi bi-download me-1"></i> Resume
                        </a>
                    @endif
                </div>
                <div class="d-flex gap-2 justify-content-center justify-content-lg-start">
                    @foreach ($p['socials'] as $name => $url)
                        @if ($url)
                            <a href="{{ $url }}" class="social-link" target="_blank" rel="noopener" aria-label="{{ ucfirst($name) }}">
                                <i class="bi {{ $socialIcons[$name] ?? 'bi-link-45deg' }}"></i>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 d-flex justify-content-center">
                @if ($p['avatar_url'])
                    <img src="{{ $p['avatar_url'] }}" alt="{{ $p['name'] }}" class="hero-avatar">
                @else
                    <div class="hero-avatar-placeholder">{{ strtoupper(mb_substr($p['name'], 0, 1)) }}</div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ============ ABOUT ============ --}}
<section id="about" class="section bg-soft">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 reveal">
                <h2 class="section-title mb-4">About me</h2>
                @foreach ($p['about'] as $para)
                    <p class="text-body-secondary fs-5">{{ $para }}</p>
                @endforeach
                <ul class="list-unstyled mt-4 mb-0">
                    <li class="mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i>{{ $p['location'] }}</li>
                    <li><i class="bi bi-envelope-fill text-primary me-2"></i>
                        <a href="mailto:{{ $p['email'] }}" class="text-reset">{{ $p['email'] }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 reveal">
                <div class="row g-3 text-center">
                    @foreach ($p['stats'] as $stat)
                        <div class="col-4">
                            <div class="card card-lift py-4 h-100">
                                <div class="h2 fw-bolder text-gradient mb-1">{{ $stat['value'] }}</div>
                                <div class="small text-body-secondary">{{ $stat['label'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ SKILLS ============ --}}
<section id="skills" class="section">
    <div class="container">
        <h2 class="section-title text-center mb-5">My skills</h2>
        <div class="row g-4 justify-content-center">
            @foreach (array_chunk($p['skills'], (int) ceil(count($p['skills']) / 2)) as $column)
                <div class="col-lg-5 reveal">
                    @foreach ($column as $skill)
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">{{ $skill['name'] }}</span>
                                <span class="text-body-secondary">{{ $skill['level'] }}%</span>
                            </div>
                            <div class="skill-bar"><span data-level="{{ $skill['level'] }}"></span></div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ EXPERIENCE ============ --}}
<section id="experience" class="section bg-soft">
    <div class="container">
        <h2 class="section-title text-center mb-5">Education</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="timeline">
                    @foreach ($p['experience'] as $item)
                        <div class="timeline-item reveal">
                            <div class="small text-primary fw-semibold">{{ $item['period'] }}</div>
                            <h3 class="h5 fw-bold mb-1">{{ $item['role'] }}</h3>
                            <div class="text-body-secondary mb-2">{{ $item['company'] }}</div>
                            <p class="mb-0">{{ $item['details'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ PROJECTS ============ --}}
<section id="projects" class="section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Projects</h2>
        @if ($projects->isEmpty())
            <p class="text-center text-body-secondary">Projects will appear here soon.</p>
        @else
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        @include('partials.project-card', ['project' => $project])
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('projects') }}" class="btn btn-outline-secondary btn-lg px-4">
                    All projects <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        @endif
    </div>
</section>

{{-- ============ BLOG ============ --}}
@if ($posts->isNotEmpty())
<section id="blog" class="section bg-soft">
    <div class="container">
        <h2 class="section-title text-center mb-5">Latest from the blog</h2>
        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    @include('partials.post-card', ['post' => $post])
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                Read more articles <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============ CONTACT ============ --}}
<section id="contact" class="section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Get in touch</h2>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-4 reveal">
                <p class="text-body-secondary fs-5">Have a project in mind or just want to say hello? Send me a message and I'll get back to you as soon as I can.</p>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="icon-circle"><i class="bi bi-envelope"></i></span>
                    <a href="mailto:{{ $p['email'] }}" class="text-reset text-break">{{ $p['email'] }}</a>
                </div>
                @if ($p['phone'])
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="icon-circle"><i class="bi bi-telephone"></i></span>
                        <span>{{ $p['phone'] }}</span>
                    </div>
                @endif
                <div class="d-flex align-items-center gap-3">
                    <span class="icon-circle"><i class="bi bi-geo-alt"></i></span>
                    <span>{{ $p['location'] }}</span>
                </div>
            </div>
            <div class="col-lg-6 reveal">
                @if (session('contact_success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('contact_success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="card card-body p-4" novalidate>
                    @csrf
                    <div class="hp-field" aria-hidden="true">
                        <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Subject <span class="text-body-secondary">(optional)</span></label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                   class="form-control @error('subject') is-invalid @enderror">
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" rows="5"
                                      class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-brand btn-lg w-100">
                                <i class="bi bi-send me-1"></i> Send message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
