@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ajouter un match</h1>
    <form action="{{ route('basket_matches.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="equipe_domicile_id" class="form-label">Équipe domicile</label>
            <select name="equipe_domicile_id" id="equipe_domicile_id" class="form-control" required>
                <option value="">Sélectionner une équipe</option>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="equipe_exterieure_id" class="form-label">Équipe extérieure</label>
            <select name="equipe_exterieure_id" id="equipe_exterieure_id" class="form-control" required>
                <option value="">Sélectionner une équipe</option>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="score_domicile" class="form-label">Score domicile</label>
            <input type="number" name="score_domicile" id="score_domicile" class="form-control">
        </div>
        <div class="mb-3">
            <label for="score_exterieur" class="form-label">Score extérieur</label>
            <input type="number" name="score_exterieur" id="score_exterieur" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('basket_matches.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
