<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;
use Laravel\Socialite\Facades\Socialite;

class CallbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Socialite::driver('google')->user();
        
        $usuari = new Usuari;
        $usuari->email = $user->email;
        $usuari->nom = $user->user['given_name'];
        $usuari->cognoms = $user->user['family_name'];
        $usuari->categoria = (strpos(explode('@', $user->email)[0], '.')) ? 'professor' : 'alumne';     // Si el correu conté un punt al principi, és un professor
        $usuari->etapa;
        $usuari->curs;
        $usuari->grup;
        $usuari->admin = false;
        $usuari->superadmin = false;
        
        return dd($usuari);
    }
}
