<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taller;
use PhpParser\Node\Stmt\TryCatch;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('tallers/llista-tallers');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $taller = Taller::orderBy('id', 'DESC')->take(1)->get();

        $nou_taller = new Taller;
        $nou_taller->id = ($taller->count()) ? $taller->id + 1 : 1;
        $nou_taller->creador = 0;

        return view('tallers/nou-taller', compact('nou_taller'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'descripcio' => 'required',
            'material' => 'required'
        ],
        [
            'nom.required' => 'El camp nom és obligatori.',
            'descripcio.required' => 'El camp descripció és obligatori.',
            'material.required' => 'El camp material és obligatori.',

        ]);
        $taller = new Taller;
        $taller->nom = $request->nom;
        $taller->creador = $request->proposat;
        $taller->descripcio = $request->descripcio;
        $taller->adreçat = implode(',', $request->adresat);
        $taller->material = $request->material;
        $taller->observacions = $request->observacions;
        $taller->actiu = 0;

        try {
            $taller->save();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
