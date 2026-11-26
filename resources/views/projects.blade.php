@extends('layouts.app')

@section('title', 'Projects | '.config('portfolio.name'))

@section('content')
<section class="section" style="padding-top:8rem">
    <div class="container">
        <h1 class="section-title mb-5">Projects</h1>
        @if ($projects->isEmpty())
            <p class="text-body-secondary">No projects yet. Check back soon!</p>
        @else
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        @include('partials.project-card', ['project' => $project])
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
