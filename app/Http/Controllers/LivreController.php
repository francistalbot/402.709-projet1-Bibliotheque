<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $livres = Livre::query(); // Commencer avec un Query Builder
        $authors = Author::all();
        $categories = Category::all();
        $livresPromo = Livre::where('promo', true)->get(); // Livres en promotion

        // Recherche
        if ($search = request('search')) {
            $livres->where(function ($query) use ($search) {
                $query->where('titre', 'like', "%{$search}%");
            });
        }
$selectedAuthor = request('author');
$selectedCategory = request('category');
        // Filtrage par auteurs
        if ($author = request('author')) {
            $livres->whereHas('auteur', function ($query) use ($author) {
                $query->where('name', 'like', "%{$author}%");
            });
        }

        // Filtrage par catégorie
        if ($category = request('category')) {
            $livres->whereHas('categorie', function ($query) use ($category) {
                $query->where('name', 'like', "%{$category}%");
            });
        }
        // Filtrage par annee minimum 
        if ($anneemin = request('annee_min')) {
            $livres->where('publication_annee', '>=', (int) $anneemin);
        }

        // Filtrage par annee maximum 
        if ($anneemax = request('annee_max')) {
            $livres->where('publication_annee', '<=', (int) $anneemax);
        }

        // Filtrage par prix minimum
        if ($prixmin = request('prix_min')) {
            $livres->where('prix', '>=', $prixmin);
        }

        // Filtrage par prix maximum
        if ($prixmax = request('prix_max')) {
            $livres->where('prix', '<=', $prixmax);
        }

        $livres = $livres->get(); // Exécuter la query

        return view('livres.index', compact('livres', 'livresPromo', 'authors', 'categories', 'selectedAuthor', 'selectedCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('livres.create', compact('authors'), compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation des données


        try {
            $validatedData = $request->validate([
                'titre' => 'required|string|max:255',
                'auteur_id' => 'required|exists:author,id',
                'categorie_id' => 'required|exists:category,id',
                'publication_annee' => 'required|integer',
                'prix' => 'required|numeric',
                'isbn' => 'required|string|max:13|unique:livres,isbn',
                'resume' => 'nullable|string',
                'promo' => 'sometimes|boolean',
            ]);
            // Création du livre (remplacer par la logique de votre modèle)
            Livre::create($validatedData);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }


        // Redirection vers la liste des livres avec un message de succès
        return redirect()->route('livres.index')->with('success', 'Livre créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $livre)
    {
        $livre = Livre::findOrFail($livre);
        return view('livres.show', compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $livre)
    {
        $livre = Livre::findOrFail($livre);
        $authors = Author::all();
        $categories = Category::all();
        return view('livres.edit', compact('livre', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livre)
    {
        $livre = Livre::findOrFail($livre);
        // Validation des données
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur_id' => 'required|exists:author,id',
            'categorie_id' => 'required|exists:category,id',
            'publication_annee' => 'required|integer',
            'prix' => 'required|numeric',
            'isbn' => 'required|string|max:13|unique:livres,isbn,' . $livre->id,
            'resume' => 'nullable|string',
            'promo' => 'sometimes|boolean',
        ]);
        // Mise à jour du livre
        $livre->update($validatedData);
        return redirect()->route('livres.show', ['livre' => $livre])->with('success', 'Livre mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $livre)
    {
        $livre = Livre::findOrFail($livre);
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès !');
    }
}
