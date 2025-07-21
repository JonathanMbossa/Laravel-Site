@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ajouter une équipe</h1>
    <form action="{{ route('equipes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
