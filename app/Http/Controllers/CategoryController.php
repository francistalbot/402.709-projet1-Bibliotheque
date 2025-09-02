<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        // Création de la catégorie (remplacer par la logique de votre modèle)  
        Category::create($validatedData);
        // Redirection vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès !');     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Category::findOrFail($id);
        return view('category.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Category::findOrFail($id);
        return view('category.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $category)
    {
        $categorie = Category::findOrFail($category);
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // Mise à jour de la catégorie
        $categorie->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        $categorie = Category::findOrFail($category);
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès !');
    }
}
