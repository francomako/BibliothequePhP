<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Affiche la liste de tous les livres.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupère tous les livres de la base de données
        $books = Book::all();
        // Retourne la vue 'books.index' avec les livres
        return view('books.index', ['books' => $books]);
    }


    public function welcome()
    {
        $books = Book::all();
        $promotions = Book::where('price', '<', 'original_price')->get();

        return view('welcome', compact('books', 'promotions'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau livre.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Stocke un nouveau livre dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'summary' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // Crée un nouveau livre avec les données validées
        Book::create($request->all());

        // Redirige vers la page d'accueil avec un message de succès
        return redirect()->route('home')->with('success', 'Livre ajouté avec succès!');
    }

    /**
     * Affiche les détails d'un livre spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Supprime un livre de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('home')->with('success', 'Livre supprimé avec succès!');
    }
}
