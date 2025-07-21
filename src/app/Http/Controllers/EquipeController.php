<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipes = Equipe::all();
        return view('equipes.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
        ]);
        Equipe::create($validated);
        return redirect()->route('equipes.index')->with('success', 'Equipe créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipe = Equipe::findOrFail($id);
        return view('equipes.show', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipe = Equipe::findOrFail($id);
        return view('equipes.edit', compact('equipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
        ]);
        $equipe = Equipe::findOrFail($id);
        $equipe->update($validated);
        return redirect()->route('equipes.index')->with('success', 'Equipe modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipe = Equipe::findOrFail($id);
        $equipe->delete();
        return redirect()->route('equipes.index')->with('success', 'Equipe supprimée avec succès.');
    }
}
