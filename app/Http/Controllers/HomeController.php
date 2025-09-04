<?php

namespace App\Http\Controllers;
use App\Models\Livre;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('livres.index');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function nouveautes()
    {
        $livres = Livre::latest()->take(5)->get();
        return view('pages.nouveautes', compact('livres'));
    }
    public function showMessages()
    {
        // Logique pour afficher les messages (à implémenter)
        $messages = []; // Remplacer par la récupération réelle des messages
        return view('pages.messages', compact('messages'));
    }
    public function storeMessage(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Logique pour stocker le message (à implémenter)

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès !');
    }
}
