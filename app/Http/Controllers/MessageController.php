<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();
        return view('pages.messages', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'texte' => 'required|string',
        ]);

        // Création du message
        Message::create($validatedData);

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès !');
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {/*
        $categorie = Category::findOrFail($category);
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // Mise à jour de la catégorie
        $categorie->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    */
        $message = Message::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'texte' => 'required|string',
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
