@extends('layouts.app')

@section('title', 'Blog | '.config('portfolio.name'))

@section('content')
<section class="section" style="padding-top:8rem">
    <div class="container">
        <h1 class="section-title mb-5">Blog</h1>
        @if ($posts->isEmpty())
            <p class="text-body-secondary">No articles published yet.</p>
        @else
            <div class="row g-4">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        @include('partials.post-card', ['post' => $post])
                    </div>
                @endforeach
            </div>
            <div class="mt-5 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
