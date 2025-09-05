@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Liste des Livres</h1>
        
        <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Ajouter un Livre
        </a>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
            @foreach ($books as $book)
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $book->title }}</h2>
                    <p class="text-gray-700">Auteur: {{ $book->author }}</p>
                    <p class="text-gray-700">Année de publication: {{ $book->publication_year }}</p>
                    <p class="text-gray-700">Prix: {{ number_format($book->price, 2) }} $</p>
                    <a href="{{ route('books.show', $book->id) }}" class="text-blue-500 hover:underline mt-2 inline-block">Voir les détails</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection