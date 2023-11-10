@extends('layouts.admin')

@section('content')
    @if (session('messaggio'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Congratulazioni!</strong> {{ session('messaggio') }}
        </div>
    @endif

    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>

                {{--  <form class="mx-2" action="{{ route('project.create') }}">
                    <button class="btn btn-success mb-3" type="submit">Aggiungi un nuovo progetto</button>
                </form> --}}

                {{$projects->links('pagination::bootstrap-5')}}

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
                            N/A
                        @endif

                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->tech }}</td>
                        <td>{{ $project->github }}</td>
                        <td>{{ $project->link }}</td>
                        <td>show/edit/delete</td>
                        <td class="d-flex">

                            {{-- <form action="{{ route('project.show', [$project->id]) }}">

                                <button class="btn btn-primary mb-3" type="submit">Show</button>
                            </form>

                            <form class="mx-2" action="{{ route('project.edit', [$project->id]) }}">

                                <button class="btn btn-info mb-3" type="submit">Edit</button>
                            </form>

                            <form action="{{ route('project.destroy', [$project->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mb-3" type="submit">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach

                    
                    
                </tbody>
        </table>
        
        {{$projects->links('pagination::bootstrap-5')}}
        
    </div>
    @endsection
    