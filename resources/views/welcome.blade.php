@extends('layouts.app')

@section('title', 'Bienvenue')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">Bienvenue sur la Bibliothèque</h1>
        <p class="lead text-muted">Explorez notre collection, recherchez des ouvrages et découvrez nos promotions.</p>
    </div>

    {{-- Zone de recherche --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">🔍 Recherche avancée</h4>
            <form method="GET" action="{{ route('books.search') }}" class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="title" class="form-control" placeholder="Titre">
                </div>
                <div class="col-md-3">
                    <input type="text" name="author" class="form-control" placeholder="Auteur">
                </div>
                <div class="col-md-2">
                    <input type="number" name="year" class="form-control" placeholder="Année">
                </div>
                <div class="col-md-2">
                    <input type="number" name="min_price" class="form-control" placeholder="Prix min">
                </div>
                <div class="col-md-2">
                    <input type="number" name="max_price" class="form-control" placeholder="Prix max">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-outline-primary">Rechercher</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Bouton Ajouter un livre (admin uniquement) --}}
    @auth
        @if(Auth::user()->role === 'admin')
            <div class="mb-4 text-end">
                <a href="{{ route('books.create') }}" class="btn btn-success">➕ Ajouter un Livre</a>
            </div>
        @endif
    @endauth

    {{-- Liste des livres --}}
    <div class="mb-5">
        <h4 class="mb-3">📚 Tous les livres disponibles</h4>
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <h6 class="text-muted">{{ $book->author }} ({{ $book->year }})</h6>
                            <p class="card-text">{{ Str::limit($book->summary, 100) }}</p>
                            <p class="fw-bold">{{ number_format($book->price, 2) }} €</p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-primary">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Livres en promotion --}}
    <div class="mb-5">
        <h4 class="mb-3 text-success">🔥 Livres en promotion</h4>
        <div class="row">
            @foreach($promotions as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-success shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <h6 class="text-muted">{{ $book->author }} ({{ $book->year }})</h6>
                            <p class="card-text">{{ Str::limit($book->summary, 100) }}</p>
                            <p class="fw-bold text-success">
                                <del>{{ number_format($book->original_price, 2) }} €</del>
                                {{ number_format($book->price, 2) }} €
                            </p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-success">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection