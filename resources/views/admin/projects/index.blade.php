@extends('layouts.admin')

@section('content')
    @if (session('messaggio'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Congratulazioni!</strong> {{ session('messaggio') }}
        </div>
    @endif

    <h1>Projects all</h1>

    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>

                <form class="mx-2" action="{{ route('admin.projects.create') }}">
                    <button class="btn btn-success mb-3" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                        </svg>
                        Upload a new projects</button>
                </form>

                {{ $projects->links('pagination::bootstrap-5') }}

                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">THUMB</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">TECH</th>
                    <th scope="col">GITHUB</th>
                    <th scope="col">LINK</th>
                    <th scope="col">ACTIONS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td scope="row">{{ $project->id }}</td>

                        @if (str_contains($project->thumb, 'http'))
                            <td class="text-center align-middle"><img class="img-fluid img-fluid object-fit-cover"
                                    style="height: 100px" src="{{ $project->thumb }}" alt="{{ $project->title }}"></td>
                        @else
                            <td class="text-center align-middle"><img class="img-fluid img-fluid object-fit-cover"
                                    style="height: 100px" src="{{ asset('storage/' . $project->thumb) }}"></td>
                        @endif

                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->tech }}</td>
                        <td>{{ $project->github }}</td>
                        <td>{{ $project->link }}</td>
                        {{-- <td>show/edit/delete</td> --}}
                        <td class="d-flex">

                            <form action="{{ route('admin.projects.show', [$project->id]) }}">

                                <button class="btn btn-primary mb-3" type="submit">Show</button>
                            </form>

                            <form class="mx-2" action="{{ route('admin.projects.edit', [$project->id]) }}">

                                <button class="btn btn-info mb-3" type="submit">Edit</button>
                            </form>

                            <form action="{{ route('admin.projects.destroy', [$project->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mb-3" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}

    </div>
@endsection
