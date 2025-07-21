@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Modifier le match</h1>
    <form action="{{ route('basket_matches.update', $match) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $match->date }}" required>
        </div>
        <div class="mb-3">
            <label for="equipe_domicile_id" class="form-label">Équipe domicile</label>
            <select name="equipe_domicile_id" id="equipe_domicile_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" @if($match->equipe_domicile_id == $equipe->id) selected @endif>{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="equipe_exterieure_id" class="form-label">Équipe extérieure</label>
            <select name="equipe_exterieure_id" id="equipe_exterieure_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" @if($match->equipe_exterieure_id == $equipe->id) selected @endif>{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="score_domicile" class="form-label">Score domicile</label>
            <input type="number" name="score_domicile" id="score_domicile" class="form-control" value="{{ $match->score_domicile }}">
        </div>
        <div class="mb-3">
            <label for="score_exterieur" class="form-label">Score extérieur</label>
            <input type="number" name="score_exterieur" id="score_exterieur" class="form-control" value="{{ $match->score_exterieur }}">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('basket_matches.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
