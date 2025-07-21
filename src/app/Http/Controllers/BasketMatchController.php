<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasketMatch;
use App\Models\Equipe;

class BasketMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = BasketMatch::with(['equipeDomicile', 'equipeExterieure'])->get();
        return view('basket_matches.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipes = Equipe::all();
        return view('basket_matches.create', compact('equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'equipe_domicile_id' => 'required|exists:equipes,id|different:equipe_exterieure_id',
            'equipe_exterieure_id' => 'required|exists:equipes,id|different:equipe_domicile_id',
            'score_domicile' => 'nullable|integer',
            'score_exterieur' => 'nullable|integer',
        ]);
        BasketMatch::create($validated);
        return redirect()->route('basket_matches.index')->with('success', 'Match créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $match = BasketMatch::with(['equipeDomicile', 'equipeExterieure'])->findOrFail($id);
        return view('basket_matches.show', compact('match'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $match = BasketMatch::findOrFail($id);
        $equipes = Equipe::all();
        return view('basket_matches.edit', compact('match', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'equipe_domicile_id' => 'required|exists:equipes,id|different:equipe_exterieure_id',
            'equipe_exterieure_id' => 'required|exists:equipes,id|different:equipe_domicile_id',
            'score_domicile' => 'nullable|integer',
            'score_exterieur' => 'nullable|integer',
        ]);
        $match = BasketMatch::findOrFail($id);
        $match->update($validated);
        return redirect()->route('basket_matches.index')->with('success', 'Match modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $match = BasketMatch::findOrFail($id);
        $match->delete();
        return redirect()->route('basket_matches.index')->with('success', 'Match supprimé avec succès.');
    }
}
