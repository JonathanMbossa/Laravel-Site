@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Modifier l'équipe</h1>
    <form action="{{ route('equipes.update', $equipe) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $equipe->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" value="{{ $equipe->ville }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
