<div class="card card-lift h-100 overflow-hidden reveal">
    @if ($project->image_url)
        <img src="{{ $project->image_url }}" class="project-thumb" alt="{{ $project->title }}" loading="lazy">
    @else
        <div class="project-thumb-placeholder"><i class="bi bi-code-slash"></i></div>
    @endif
    <div class="card-body d-flex flex-column">
        <h3 class="h5 fw-bold">{{ $project->title }}</h3>
        <p class="text-body-secondary flex-grow-1">{{ $project->description }}</p>
        @if (count($project->techList()))
            <div class="d-flex flex-wrap gap-2 mb-3">
                @foreach ($project->techList() as $tech)
                    <span class="tech-badge">{{ $tech }}</span>
                @endforeach
            </div>
        @endif
        <div class="d-flex gap-2">
            @if ($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="btn btn-sm btn-brand">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Live demo
                </a>
            @endif
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-github me-1"></i> Code
                </a>
            @endif
        </div>
    </div>
</div>
