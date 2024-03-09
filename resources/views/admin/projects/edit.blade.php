@extends('layouts.app')

@section('page-title', 'Edit project')

@section('main-content')
  <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-3">
                <label for="title" class="form-label text-white">Titolo*</label>
                <input value="{{ $project->title }}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="200" required>
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
                <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Aggiungi una descrizione" maxlength="1024" required>
                {{ $project->description }}
                </textarea>
            </div>
            <div class="my-3">
                <label for="client" class="form-label text-white">Cliente*</label>
                <input value="{{ $project->client }}" type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" placeholder="Inserisci il cliente..." maxlength="46" required>
            </div>
            <button class="btn btn-primary" type="submit">
                Modifica +
            </button>
        </form>
    </div>
@endsection
