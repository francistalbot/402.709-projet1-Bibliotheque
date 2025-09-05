<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use App\Models\Message;

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
        $livres = Livre::latest()->take(3)->get();
        return view('pages.nouveautes', compact('livres'));
    }
    public function showMessages()
    {
        $messages = Message::all();
        return view('pages.messages', compact('messages'));
    }
    public function storeMessage(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'texte' => 'required|string',
        ]);

        // Création du message
        Message::create($validatedData);
        echo "Message créé avec succès !";

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès !');
    }
}
