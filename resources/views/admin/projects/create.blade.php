@extends('layouts.app')

@section('page-title', 'Crea Nuovo Progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei loggato!
                    </h1>
                    <h2 class="text-center my-2">Aggiungi un nuovo progetto</h2>
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
                <form action="{{ route('admin.projects.store') }}" method="POST">
                    @csrf
                    <div class="my-3">
                        <label for="title" class="form-label text-white">Titolo*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="200" required value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option
                                value=""
                                {{ old('type_id') == null ? 'selected' : '' }}>
                                Seleziona un type...
                            </option>
                            @foreach ($types as $type)
                                <option
                                    value="{{ $type->id }}"
                                    {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="description" class="form-label text-white">Descrizione*</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Aggiungi una descrizione" maxlength="1024" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="client" class="form-label text-white">Cliente*</label>
                        <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" placeholder="Inserisci il cliente..." maxlength="46" required value="{{ old('client') }}">
                        @error('client')
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