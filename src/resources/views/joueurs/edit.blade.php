@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Modifier le joueur</h1>
    <form action="{{ route('joueurs.update', $joueur) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $joueur->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $joueur->prenom }}" required>
        </div>
        <div class="mb-3">
            <label for="poste" class="form-label">Poste</label>
            <input type="text" name="poste" id="poste" class="form-control" value="{{ $joueur->poste }}" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Numéro</label>
            <input type="number" name="numero" id="numero" class="form-control" value="{{ $joueur->numero }}" required>
        </div>
        <div class="mb-3">
            <label for="equipe_id" class="form-label">Équipe</label>
            <select name="equipe_id" id="equipe_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" @if($joueur->equipe_id == $equipe->id) selected @endif>{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('joueurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
