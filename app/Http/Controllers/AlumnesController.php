<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuari;
use Illuminate\Support\Facades\Storage;

class AlumnesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (Auth::check() && (Auth::user()->admin || Auth::user()->superadmin)) {
            $usuaris = Usuari::all();
            return view('alumnes', compact('usuaris'));
        }
        abort(403, "Què fas tu aquí?");
    }

    /**
     * Actualitzar dades de les persones
     */
    public function actualitzar()
    {
        // Comprovem que hi hagi login i permisos si no abortem
        if (Auth::check() && (Auth::user()->admin || Auth::user()->superadmin)) {
            // Llegim el fitxer
            $fitxer = Storage::get('llista.txt');
            $linies = explode(PHP_EOL, $fitxer);
            $linies_alumnes = array();

            // Netejem espais i salts de linia
            foreach ($linies as $linia) {
                $paraules = explode(" ", $linia);
                if (filter_var($paraules[0], FILTER_VALIDATE_EMAIL)) {
                    $array_netejada = array_filter($paraules);
                    array_push($linies_alumnes, $array_netejada);
                }
            }

            // Construim una array associativa perque sigui més facil asignar camps
            $info_alumnes = array();
            foreach ($linies_alumnes as $linia) {
                $alumne = array();
                $linia = array_values($linia);
                foreach ($linia as $clau => $valor) {
                    if ($clau == '0') {
                        array_push($alumne, $alumne['email'] = $valor);
                    } elseif ($clau == '1') {
                        array_push($alumne, $alumne['curs'] = $valor);
                    } elseif ($clau == count($linia) - 1) {
                        array_push($alumne, $alumne['nom'] = $valor);
                    } else {
                        array_push($alumne, $alumne['cognoms'] = $valor . ($alumne['cognoms'] ?? ''));
                    }
                }
                $alumne['cognoms'] = array_filter(array_reverse(explode(',', $alumne['cognoms'])));
                $alumne['cognoms'] = implode(' ', $alumne['cognoms']);
                $alumne['curs'] = str_replace('OU=', '', $alumne['curs']);
                $array = preg_split('/([\d]+)/', $alumne['curs'], -1, PREG_SPLIT_DELIM_CAPTURE);
                $alumne['curs'] = $array[1];
                $alumne['etapa'] = $array[0];
                $alumne['grup'] = $array[2];
                array_push($info_alumnes, $alumne);
            }

            // Comprovem per cada usuari si aquest existeix a la BBDD, si existeix sobreescrivim, si no fem un nou
            foreach ($info_alumnes as $alumne) {
                $usuari = Usuari::where('email', $alumne['email'])->first();
                if ($usuari) {
                    $usuari->email = $alumne['email'];
                    $usuari->nom = $alumne['nom'];
                    $usuari->cognoms = $alumne['cognoms'];
                    $usuari->etapa = $alumne['etapa'];
                    $usuari->curs = $alumne['curs'];
                    $usuari->grup = $alumne['grup'];
                    $usuari->categoria = (strpos(explode('@', $alumne['email'])[0], '.')) ? 'alumne' : 'professor';

                    try {
                        $usuari->save();
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error', 'Hi ha hagut un problema amb la actualització de les dades.');
                    }
                } else {
                    $persona_nova = new Usuari;
                    $persona_nova->email = $alumne['email'];
                    $persona_nova->nom = $alumne['nom'];
                    $persona_nova->cognoms = $alumne['cognoms'];
                    $persona_nova->etapa = $alumne['etapa'];
                    $persona_nova->curs = $alumne['curs'];
                    $persona_nova->grup = $alumne['grup'];
                    $persona_nova->categoria = (strpos(explode('@', $alumne['email'])[0], '.')) ? 'alumne' : 'professor';
                    $persona_nova->admin = 0;
                    $persona_nova->superadmin = 0;

                    try {
                        $persona_nova->save();
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error', 'Hi ha hagut un problema amb la actualització de les dades.');
                    }
                }
            }
            // Si fins aquí no ha petat vol dir que ha anat bé 
            return redirect()->back()->with('success', 'Dades carregades correctament.');
        }
        abort(403, "Què fas tu aquí?");
    }
}
