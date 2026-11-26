@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 fw-bold mb-0">Blog posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg"></i> New post</a>
</div>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr><th>Title</th><th>Status</th><th>Published</th><th class="text-end">Actions</th></tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td class="fw-semibold">{{ $post->title }}</td>
                        <td>
                            @if ($post->isPublished())
                                <span class="badge text-bg-success">Published</span>
                            @else
                                <span class="badge text-bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td class="text-body-secondary small">{{ $post->published_at?->format('M d, Y') ?? '-' }}</td>
                        <td class="text-end text-nowrap">
                            @if ($post->isPublished())
                                <a href="{{ route('blog.show', $post) }}" target="_blank" class="btn btn-sm btn-outline-secondary">View</a>
                            @endif
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" class="d-inline"
                                  data-confirm="Delete this post?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-body-secondary py-4">No posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center">{{ $posts->links() }}</div>
@endsection
