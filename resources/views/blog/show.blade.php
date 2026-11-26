@extends('layouts.app')

@section('title', $post->title.' | '.config('portfolio.name'))
@section('description', $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->body), 150))

@section('content')
<article class="section" style="padding-top:8rem">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('blog.index') }}" class="text-decoration-none small">
                    <i class="bi bi-arrow-left"></i> Back to blog
                </a>
                <h1 class="fw-bolder display-5 mt-3 mb-3">{{ $post->title }}</h1>
                <div class="text-body-secondary mb-4">
                    {{ $post->published_at->format('F d, Y') }} &middot; {{ $post->readingTime() }} min read
                </div>
                @if ($post->cover_url)
                    <img src="{{ $post->cover_url }}" alt="{{ $post->title }}" class="img-fluid rounded-4 mb-4 w-100">
                @endif
                <div class="post-body">
                    {!! $post->html() !!}
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
