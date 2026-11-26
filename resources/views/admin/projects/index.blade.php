@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 fw-bold mb-0">Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg"></i> New project</a>
</div>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr><th>Title</th><th>Tech</th><th class="text-center">Featured</th><th class="text-center">Order</th><th class="text-end">Actions</th></tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td class="fw-semibold">{{ $project->title }}</td>
                        <td class="text-body-secondary small">{{ $project->tech_stack }}</td>
                        <td class="text-center">
                            @if ($project->featured)<i class="bi bi-star-fill text-warning"></i>@else<span class="text-body-secondary">-</span>@endif
                        </td>
                        <td class="text-center">{{ $project->sort_order }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="d-inline"
                                  data-confirm="Delete this project?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-body-secondary py-4">No projects yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center">{{ $projects->links() }}</div>
@endsection
