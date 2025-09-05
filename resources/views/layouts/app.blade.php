<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque de Livres</title>
    {{-- Importe les styles de Tailwind CSS pour un style rapide --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-800">Ma Bibliothèque</div>
            <nav>
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 mx-2">Accueil</a>
                <a href="{{ route('books.search') }}" class="text-gray-600 hover:text-gray-900 mx-2">Chercher</a>
                <a href="{{ route('books.latest') }}" class="text-gray-600 hover:text-gray-900 mx-2">Nouveautés</a>
                <a href="{{ route('contact') }}" class="text-gray-600 hover:text-gray-900 mx-2">Contacter Nous</a>
                <a href="{{ route('messages') }}" class="text-gray-600 hover:text-gray-900 mx-2">Messages</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-8 px-6">
        @yield('content')
    </main>

    <footer class="bg-white shadow mt-8 py-4">
        <div class="container mx-auto px-6 text-center text-gray-600">
            &copy; 2024 Ma Bibliothèque. Tous droits réservés.
        </div>
    </footer>

</body>
</html>