@extends('layouts.admin')

@php $editing = $post->exists; @endphp

@section('title', $editing ? 'Edit post' : 'New post')

@section('content')
<h1 class="h3 fw-bold mb-3">{{ $editing ? 'Edit post' : 'New post' }}</h1>

<form method="POST" class="card admin-card card-body p-4"
      action="{{ $editing ? route('admin.posts.update', $post) : route('admin.posts.store') }}">
    @csrf
    @if ($editing) @method('PUT') @endif

    <div class="row g-3">
        <div class="col-12">
            <label for="title" class="form-label">Title</label>
            <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}"
                   class="form-control @error('title') is-invalid @enderror" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
            <label for="excerpt" class="form-label">Excerpt <span class="text-body-secondary">(short summary, max 300 chars)</span></label>
            <textarea id="excerpt" name="excerpt" rows="2" maxlength="300"
                      class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
            @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
            <label for="cover_url" class="form-label">Cover image URL</label>
            <input id="cover_url" name="cover_url" type="url" value="{{ old('cover_url', $post->cover_url) }}"
                   class="form-control @error('cover_url') is-invalid @enderror" placeholder="https://...">
            @error('cover_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
            <label for="body" class="form-label">Body <span class="text-body-secondary">(Markdown supported)</span></label>
            <textarea id="body" name="body" rows="14"
                      class="form-control font-monospace @error('body') is-invalid @enderror" required>{{ old('body', $post->body) }}</textarea>
            @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="published" name="published" value="1"
                       @checked(old('published', $post->exists ? $post->published_at !== null : true))>
                <label class="form-check-label" for="published">Published (uncheck to save as a draft)</label>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <button class="btn btn-brand" type="submit">{{ $editing ? 'Save changes' : 'Create post' }}</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
</form>
@endsection
