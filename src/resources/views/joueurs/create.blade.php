@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ajouter un joueur</h1>
    <form action="{{ route('joueurs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="poste" class="form-label">Poste</label>
            <input type="text" name="poste" id="poste" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Numéro</label>
            <input type="number" name="numero" id="numero" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="equipe_id" class="form-label">Équipe</label>
            <select name="equipe_id" id="equipe_id" class="form-control" required>
                <option value="">Sélectionner une équipe</option>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('joueurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
