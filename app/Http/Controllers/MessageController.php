<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Affiche le formulaire de contact et les informations de la bibliothèque.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Enregistre un nouveau message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès!');
    }

    /**
     * Affiche la liste des messages reçus.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::latest()->get();
        return view('messages', ['messages' => $messages]);
    }
}