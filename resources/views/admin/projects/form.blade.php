@extends('layouts.admin')

@php $editing = $project->exists; @endphp

@section('title', $editing ? 'Edit project' : 'New project')

@section('content')
<h1 class="h3 fw-bold mb-3">{{ $editing ? 'Edit project' : 'New project' }}</h1>

<form method="POST" class="card admin-card card-body p-4"
      action="{{ $editing ? route('admin.projects.update', $project) : route('admin.projects.store') }}">
    @csrf
    @if ($editing) @method('PUT') @endif

    <div class="row g-3">
        <div class="col-12">
            <label for="title" class="form-label">Title</label>
            <input id="title" name="title" type="text" value="{{ old('title', $project->title) }}"
                   class="form-control @error('title') is-invalid @enderror" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="4"
                      class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $project->description) }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
            <label for="tech_stack" class="form-label">Tech stack <span class="text-body-secondary">(comma separated)</span></label>
            <input id="tech_stack" name="tech_stack" type="text" value="{{ old('tech_stack', $project->tech_stack) }}"
                   class="form-control @error('tech_stack') is-invalid @enderror" placeholder="Laravel, MySQL, Bootstrap">
            @error('tech_stack')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
            <label for="image_url" class="form-label">Image URL</label>
            <input id="image_url" name="image_url" type="url" value="{{ old('image_url', $project->image_url) }}"
                   class="form-control @error('image_url') is-invalid @enderror" placeholder="https://...">
            @error('image_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
            <label for="live_url" class="form-label">Live URL</label>
            <input id="live_url" name="live_url" type="url" value="{{ old('live_url', $project->live_url) }}"
                   class="form-control @error('live_url') is-invalid @enderror" placeholder="https://...">
            @error('live_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
            <label for="repo_url" class="form-label">Repository URL</label>
            <input id="repo_url" name="repo_url" type="url" value="{{ old('repo_url', $project->repo_url) }}"
                   class="form-control @error('repo_url') is-invalid @enderror" placeholder="https://github.com/...">
            @error('repo_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-3">
            <label for="sort_order" class="form-label">Sort order</label>
            <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $project->sort_order ?? 0) }}"
                   class="form-control @error('sort_order') is-invalid @enderror">
            @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-9 d-flex align-items-end">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="featured" name="featured" value="1"
                       @checked(old('featured', $project->featured))>
                <label class="form-check-label" for="featured">Featured (shown first on the home page)</label>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <button class="btn btn-brand" type="submit">{{ $editing ? 'Save changes' : 'Create project' }}</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</form>
@endsection
