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
        $livres = Livre::where('created_at', '>=', now()->subDays(10))->get();
        return view('pages.nouveautes', compact('livres'));
    }
}
