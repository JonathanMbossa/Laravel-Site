<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistique;
use App\Models\Joueur;
use App\Models\BasketMatch;

class StatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistiques = Statistique::with(['joueur', 'basketMatch'])->get();
        return view('statistiques.index', compact('statistiques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $joueurs = Joueur::all();
        $matches = BasketMatch::all();
        return view('statistiques.create', compact('joueurs', 'matches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'joueur_id' => 'required|exists:joueurs,id',
            'basket_match_id' => 'required|exists:basket_matches,id',
            'points' => 'required|integer',
            'rebonds' => 'required|integer',
            'passes' => 'required|integer',
        ]);
        Statistique::create($validated);
        return redirect()->route('statistiques.index')->with('success', 'Statistique créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $statistique = Statistique::with(['joueur', 'basketMatch'])->findOrFail($id);
        return view('statistiques.show', compact('statistique'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $statistique = Statistique::findOrFail($id);
        $joueurs = Joueur::all();
        $matches = BasketMatch::all();
        return view('statistiques.edit', compact('statistique', 'joueurs', 'matches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'joueur_id' => 'required|exists:joueurs,id',
            'basket_match_id' => 'required|exists:basket_matches,id',
            'points' => 'required|integer',
            'rebonds' => 'required|integer',
            'passes' => 'required|integer',
        ]);
        $statistique = Statistique::findOrFail($id);
        $statistique->update($validated);
        return redirect()->route('statistiques.index')->with('success', 'Statistique modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $statistique = Statistique::findOrFail($id);
        $statistique->delete();
        return redirect()->route('statistiques.index')->with('success', 'Statistique supprimée avec succès.');
    }
}
