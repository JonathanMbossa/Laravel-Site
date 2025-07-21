@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ajouter une statistique</h1>
    <form action="{{ route('statistiques.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="joueur_id" class="form-label">Joueur</label>
            <select name="joueur_id" id="joueur_id" class="form-control" required>
                <option value="">Sélectionner un joueur</option>
                @foreach($joueurs as $joueur)
                    <option value="{{ $joueur->id }}">{{ $joueur->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="basket_match_id" class="form-label">Match</label>
            <select name="basket_match_id" id="basket_match_id" class="form-control" required>
                <option value="">Sélectionner un match</option>
                @foreach($matches as $match)
                    <option value="{{ $match->id }}">Match #{{ $match->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="points" class="form-label">Points</label>
            <input type="number" name="points" id="points" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rebonds" class="form-label">Rebonds</label>
            <input type="number" name="rebonds" id="rebonds" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="passes" class="form-label">Passes</label>
            <input type="number" name="passes" id="passes" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('statistiques.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
