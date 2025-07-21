<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use App\Models\Equipe;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\Joueur::with('equipe');
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                  ->orWhere('prenom', 'like', "%$search%") ;
            });
        }
        if ($request->filled('equipe_id')) {
            $query->where('equipe_id', $request->input('equipe_id'));
        }
        $joueurs = $query->paginate(10)->withQueryString();
        $equipes = \App\Models\Equipe::all();
        return view('joueurs.index', compact('joueurs', 'equipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipes = Equipe::all();
        return view('joueurs.create', compact('equipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'numero' => 'required|integer',
            'equipe_id' => 'required|exists:equipes,id',
        ]);
        Joueur::create($validated);
        return redirect()->route('joueurs.index')->with('success', 'Joueur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $joueur = Joueur::with('equipe')->findOrFail($id);
        return view('joueurs.show', compact('joueur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $joueur = Joueur::findOrFail($id);
        $equipes = Equipe::all();
        return view('joueurs.edit', compact('joueur', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'numero' => 'required|integer',
            'equipe_id' => 'required|exists:equipes,id',
        ]);
        $joueur = Joueur::findOrFail($id);
        $joueur->update($validated);
        return redirect()->route('joueurs.index')->with('success', 'Joueur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $joueur = Joueur::findOrFail($id);
        $joueur->delete();
        return redirect()->route('joueurs.index')->with('success', 'Joueur supprimé avec succès.');
    }
}
