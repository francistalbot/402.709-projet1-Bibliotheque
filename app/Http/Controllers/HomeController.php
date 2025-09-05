<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;


class HomeController extends Controller
{
    public function index()
    {
                // Recherche
        if ($search = request('search')) {
            $livres = Livre::where('titre', 'like', "%{$search}%")
                ->orWhere('publication_annee', 'like', "%{$search}%")
                ->orWhereHas('auteur', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('categorie', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->get();
        } else {            
            $livres = Livre::all();
        }
        return view('pages.accueil', compact('livres'));
    }   

    public function contact()
    {
        return view('pages.contact');
    }
}
