@extends('layouts.app')

@section('page-title', $technology->title)

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
                    {{ $technology->title }} 
                </div>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $technology->id }}</th>
                            <td>{{ $technology->title }}</td>
                            <td>{{$technology->slug }}</td>
                            <td>{{$technology->description }}</td>
                            <td>{{ $technology->created_at->format('Y-m-d') }}</td>
                            <td>{{ $technology->created_at->format('H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
