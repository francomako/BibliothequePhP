@extends('layouts.app')

@section('title', 'Ajouter un Livre')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    ➕ Ajouter un nouveau livre
                </div>

                <div class="card-body">
                    {{-- Erreurs de validation --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulaire --}}
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Auteur</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Année de publication</label>
                            <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="summary" class="form-label">Résumé</label>
                            <textarea name="summary" class="form-control" rows="4" required>{{ old('summary') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Prix (€)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection