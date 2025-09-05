@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Ajouter un nouveau livre</h1>
        
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Titre</label>
                <input type="text" id="title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-bold mb-2">Auteur</label>
                <input type="text" id="author" name="author" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            
            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-bold mb-2">Catégorie</label>
                <input type="text" id="category" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            
            <div class="mb-4">
                <label for="publication_year" class="block text-gray-700 font-bold mb-2">Année de publication</label>
                <input type="number" id="publication_year" name="publication_year" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            
            <div class="mb-4">
                <label for="summary" class="block text-gray-700 font-bold mb-2">Résumé</label>
                <textarea id="summary" name="summary" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            
            <div class="mb-6">
                <label for="price" class="block text-gray-700 font-bold mb-2">Prix ($)</label>
                <input type="number" step="0.01" id="price" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Ajouter le livre
                </button>
                <a href="{{ route('home') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Annuler</a>
            </div>
        </form>
    </div>
@endsection
```
