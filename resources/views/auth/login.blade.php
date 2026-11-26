<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.assets')
    <title>Admin login | {{ config('portfolio.name') }}</title>
    <meta name="robots" content="noindex">
</head>
<body class="bg-body-tertiary">
<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="card card-body p-4 p-md-5 shadow-sm" style="max-width:440px;width:100%">
        <div class="text-center mb-4">
            <div class="stat-icon mx-auto mb-3"><i class="bi bi-shield-lock"></i></div>
            <h1 class="h3 fw-bold">Admin login</h1>
            <p class="text-body-secondary mb-0">Sign in to manage your portfolio</p>
        </div>

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button class="btn btn-brand w-100 btn-lg" type="submit">Sign in</button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-decoration-none small"><i class="bi bi-arrow-left"></i> Back to site</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
