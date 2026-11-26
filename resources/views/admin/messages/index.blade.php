@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<h1 class="h3 fw-bold mb-3">Messages</h1>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr><th>From</th><th>Subject</th><th>Received</th><th class="text-end">Actions</th></tr>
            </thead>
            <tbody>
                @forelse ($messages as $m)
                    <tr>
                        <td class="{{ $m->isUnread() ? 'fw-bold' : '' }}">
                            @if ($m->isUnread())<i class="bi bi-circle-fill text-primary me-1" style="font-size:.5rem"></i>@endif
                            {{ $m->name }}
                            <div class="small text-body-secondary fw-normal">{{ $m->email }}</div>
                        </td>
                        <td class="{{ $m->isUnread() ? 'fw-bold' : '' }}">{{ \Illuminate\Support\Str::limit($m->subject ?: $m->message, 60) }}</td>
                        <td class="text-body-secondary small text-nowrap">{{ $m->created_at->diffForHumans() }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('admin.messages.show', $m) }}" class="btn btn-sm btn-outline-primary">Open</a>
                            <form method="POST" action="{{ route('admin.messages.destroy', $m) }}" class="d-inline"
                                  data-confirm="Delete this message?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-body-secondary py-4">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center">{{ $messages->links() }}</div>
@endsection
