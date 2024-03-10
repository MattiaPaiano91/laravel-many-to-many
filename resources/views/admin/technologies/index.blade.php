@extends('layouts.app')

@section('page-title', 'Tutti i progetti')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti le tecnologie utilizzate
                    </h1>

                    <div class="mb-3">
                        <a href="{{ route('admin.technologies.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Creata il</th>
                                <th scope="col">Alle</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($technologies as $technology)
                                <tr>
                                    <th scope="row">{{ $technology->id }}</th>
                                    <td>{{ $technology->title }}</td>
                                    <td>{{ $technology->description }}</td>
                                    <td>{{ $technology->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $technology->created_at->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.technologies.show', ['technology' => $technology->slug]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.technologies.edit', ['technology' => $technology->slug]) }}" class="btn btn-xs btn-warning">
                                            Modifica
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="offcanvas"
                                    data-bs-target="#deleteConfirmation{{ $technology->slug , $technology->title }}">
                                    Elimina
                                    </button>

                                <div class="offcanvas offcanvas-end d" tabindex="-1"
                                    id="deleteConfirmation{{ $technology->slug , $technology->title }}">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="deleteConfirmationLabel{{ $technology->slug , $technology->title }}">
                                            Conferma eliminazione
                                        </h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <p>Vuoi davvero eliminare <h5 class=" d-inline-block ">{{ $technology->title }}</h5> ?</p>
                                        <form class="mt-5" id="deleteForm{{ $technology->slug }}"
                                            action="{{ route('admin.technologies.destroy', ['technology' => $technology->slug]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Conferma eliminazione</button>
                                        </form>
                                    </div>
                                </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection