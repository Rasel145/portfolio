@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="h3 fw-bold mb-4">Welcome back, {{ auth()->user()->name }}</h1>

<div class="row g-3 mb-4">
    @foreach ([
        ['Projects', $projectCount, 'bi-briefcase', route('admin.projects.index')],
        ['Blog posts', $postCount, 'bi-journal-text', route('admin.posts.index')],
        ['Messages', $messageCount, 'bi-envelope', route('admin.messages.index')],
        ['Unread', $unreadCount, 'bi-envelope-exclamation', route('admin.messages.index')],
    ] as [$label, $count, $icon, $link])
        <div class="col-6 col-lg-3">
            <a href="{{ $link }}" class="text-decoration-none text-reset">
                <div class="card admin-card card-body d-flex flex-row align-items-center gap-3">
                    <div class="stat-icon"><i class="bi {{ $icon }}"></i></div>
                    <div>
                        <div class="h3 fw-bold mb-0">{{ $count }}</div>
                        <div class="small text-body-secondary">{{ $label }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="row g-3">
    <div class="col-lg-8">
        <div class="card admin-card">
            <div class="card-header bg-transparent fw-semibold d-flex justify-content-between">
                Latest messages
                <a href="{{ route('admin.messages.index') }}" class="small text-decoration-none">View all</a>
            </div>
            <div class="list-group list-group-flush">
                @forelse ($latestMessages as $m)
                    <a href="{{ route('admin.messages.show', $m) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span class="{{ $m->isUnread() ? 'fw-bold' : '' }}">
                                @if ($m->isUnread())<i class="bi bi-circle-fill text-primary me-1" style="font-size:.5rem"></i>@endif
                                {{ $m->name }}
                            </span>
                            <small class="text-body-secondary">{{ $m->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="small text-body-secondary text-truncate">{{ $m->subject ?: $m->message }}</div>
                    </a>
                @empty
                    <div class="list-group-item text-body-secondary">No messages yet.</div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card admin-card card-body">
            <div class="fw-semibold mb-3">Quick actions</div>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg"></i> New project</a>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-secondary"><i class="bi bi-plus-lg"></i> New blog post</a>
            </div>
        </div>
    </div>
</div>
@endsection
