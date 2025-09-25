<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     public function showChangePasswordForm()
    {
        return view('pages.passwordschange');
    }

    /**
     * Change the user's password.
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Vérifier si le mot de passe actuel est correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('password.change')->with('success', 'Votre mot de passe a été modifié avec succès.');
    }

}
