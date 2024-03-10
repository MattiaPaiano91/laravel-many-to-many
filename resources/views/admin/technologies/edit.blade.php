@extends('layouts.app')

@section('page-title', 'Modifica la Tecnologia')

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
                    <h2 class="text-center my-2">Modifica la tecnologia</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div>
                <form action="{{ route('admin.technologies.update', ['technology' => $technology->slug]) }}" method="POST">
                    @csrf
                    <div class="my-3">
                        <label for="title" class="form-label text-white">Titolo*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="200" required value="{{ old('title', $technology->title) }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="description" class="form-label text-white">Descrizione*</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Aggiungi una descrizione" maxlength="1024" required>{{ trim(old('description', $technology->description)) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Aggiungi +
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
