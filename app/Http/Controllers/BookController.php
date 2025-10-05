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
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'summary' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'summary' => $request->summary,
            'price' => $request->price,
        ]);

        return redirect()->route('books.show', $book->id)
                        ->with('success', '📘 Livre ajouté avec succès !');
    }

    /**
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
