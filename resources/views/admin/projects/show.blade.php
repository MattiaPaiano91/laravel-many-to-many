@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                         @if(Auth::check())
                            <p>Benvenuto, {{ Auth::user()->name }}</p>
                        @endif
                    </h1>
                    <br>
                    Pagina Index
                </div>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Type</th>
                            <th scope="col">Technologies</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ optional($project->type)->name ?? 'N/D' }}</td>
                            <td>
                                @foreach ($project->technologies as $technology)
                                <span class="badge text-bg-primary">{{ $technology->title }}</span>
                                @endforeach
                                </td>   
                            <td>{{ $project->created_at->format('Y-m-d') }}</td>
                            <td>{{ $project->created_at->format('H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


