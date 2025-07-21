@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Modifier l'entraîneur</h1>
    <form action="{{ route('entraineurs.update', $entraineur) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $entraineur->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="equipe_id" class="form-label">Équipe</label>
            <select name="equipe_id" id="equipe_id" class="form-control" required>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}" @if($entraineur->equipe_id == $equipe->id) selected @endif>{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('entraineurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
