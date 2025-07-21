<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entraineur;
use App\Models\Equipe;

class EntraineurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entraineurs = Entraineur::with('equipe')->get();
        return view('entraineurs.index', compact('entraineurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipes = Equipe::all();
        return view('entraineurs.create', compact('equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'equipe_id' => 'required|exists:equipes,id',
        ]);
        Entraineur::create($validated);
        return redirect()->route('entraineurs.index')->with('success', 'Entraîneur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $entraineur = Entraineur::with('equipe')->findOrFail($id);
        return view('entraineurs.show', compact('entraineur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entraineur = Entraineur::findOrFail($id);
        $equipes = Equipe::all();
        return view('entraineurs.edit', compact('entraineur', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'equipe_id' => 'required|exists:equipes,id',
        ]);
        $entraineur = Entraineur::findOrFail($id);
        $entraineur->update($validated);
        return redirect()->route('entraineurs.index')->with('success', 'Entraîneur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entraineur = Entraineur::findOrFail($id);
        $entraineur->delete();
        return redirect()->route('entraineurs.index')->with('success', 'Entraîneur supprimé avec succès.');
    }
}
