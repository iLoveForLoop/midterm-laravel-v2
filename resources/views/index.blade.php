@extends('layout.layout')

@section('content')
    <div class="container">
        <h2 class="mb-4">Project List</h2>

        @can('create-record')
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
        @endcan

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>Status</th>
                    @role('admin')
                        <th>Actions</th>
                    @endrole

                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->status }}</td>
                        @role('admin')
                            <td>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
