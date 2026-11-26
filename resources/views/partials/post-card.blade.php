<div class="card card-lift h-100 overflow-hidden reveal">
    @if ($post->cover_url)
        <img src="{{ $post->cover_url }}" class="project-thumb" alt="{{ $post->title }}" loading="lazy">
    @else
        <div class="project-thumb-placeholder"><i class="bi bi-journal-text"></i></div>
    @endif
    <div class="card-body d-flex flex-column">
        <div class="small text-body-secondary mb-2">
            {{ $post->published_at->format('M d, Y') }} &middot; {{ $post->readingTime() }} min read
        </div>
        <h3 class="h5 fw-bold">
            <a href="{{ route('blog.show', $post) }}" class="text-decoration-none text-reset stretched-link">{{ $post->title }}</a>
        </h3>
        <p class="text-body-secondary mb-0">{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->body), 120) }}</p>
    </div>
</div>
