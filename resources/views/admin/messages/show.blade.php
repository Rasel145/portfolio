@extends('layouts.admin')

@section('title', 'Message')

@section('content')
<a href="{{ route('admin.messages.index') }}" class="text-decoration-none small"><i class="bi bi-arrow-left"></i> Back to messages</a>

<div class="card admin-card card-body p-4 mt-3">
    <h1 class="h4 fw-bold">{{ $message->subject ?: '(No subject)' }}</h1>
    <div class="text-body-secondary mb-4">
        From <strong>{{ $message->name }}</strong>
        &lt;<a href="mailto:{{ $message->email }}">{{ $message->email }}</a>&gt;
        &middot; {{ $message->created_at->format('M d, Y H:i') }}
    </div>
    <div style="white-space:pre-wrap">{{ $message->message }}</div>

    <div class="mt-4 d-flex gap-2">
        <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: '.($message->subject ?: 'Your message')) }}" class="btn btn-brand">
            <i class="bi bi-reply"></i> Reply by email
        </a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" data-confirm="Delete this message?">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection
