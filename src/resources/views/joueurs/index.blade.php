@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header créatif -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div class="flex items-center gap-4">
            <div class="bg-orange-400 rounded-full p-3 shadow-lg">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#F59E42"/><path d="M6 12 Q12 6 18 12 Q12 18 6 12 Z" fill="#fff" fill-opacity="0.3"/><path d="M12 2 V22" stroke="#fff" stroke-width="1.5"/><path d="M2 12 H22" stroke="#fff" stroke-width="1.5"/></svg>
            </div>
<div>
                <h1 class="text-4xl font-extrabold text-blue-900 mb-1">Joueurs</h1>
                <p class="text-gray-500">Gérez tous les joueurs de vos équipes de basket</p>
            </div>
        </div>
        <a href="{{ route('joueurs.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white font-bold py-3 px-6 rounded-full shadow-xl transition transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Ajouter un joueur
        </a>
    </div>
    <!-- Statistiques rapides -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-blue-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-blue-800">{{ $joueurs->total() }}</div>
            <div class="text-xs text-blue-700 uppercase">Joueurs</div>
        </div>
        <div class="bg-orange-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-orange-700">{{ $equipes->count() }}</div>
            <div class="text-xs text-orange-600 uppercase">Équipes</div>
        </div>
        <div class="bg-green-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-green-700">{{ $joueurs->unique('poste')->count() }}</div>
            <div class="text-xs text-green-600 uppercase">Postes</div>
        </div>
        <div class="bg-gray-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-gray-700">{{ $joueurs->where('numero', '!=', null)->count() }}</div>
            <div class="text-xs text-gray-600 uppercase">Numéros attribués</div>
        </div>
    </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4 shadow">{{ session('success') }}</div>
    @endif
    <!-- Filtres -->
    <form method="GET" class="flex flex-col md:flex-row gap-4 mb-6">
        <input type="text" name="search" class="flex-1 border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" placeholder="Rechercher par nom ou prénom" value="{{ request('search') }}">
        <select name="equipe_id" class="flex-1 border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400">
            <option value="">Toutes les équipes</option>
            @foreach($equipes as $equipe)
                <option value="{{ $equipe->id }}" @if(request('equipe_id') == $equipe->id) selected @endif>{{ $equipe->nom }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">Filtrer</button>
        <a href="{{ route('joueurs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-4 py-2 rounded shadow">Réinitialiser</a>
    </form>
    <!-- Tableau créatif -->
    <div class="overflow-x-auto bg-white rounded-2xl shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Avatar</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Nom</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Prénom</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Poste</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Numéro</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Équipe</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($joueurs as $joueur)
                    <tr class="hover:bg-orange-50 transition">
                        <!-- Avatar avec initiales -->
                        <td class="px-4 py-2">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-400 to-yellow-300 flex items-center justify-center text-white font-bold text-lg shadow">
                                {{ strtoupper(substr($joueur->prenom,0,1)) }}{{ strtoupper(substr($joueur->nom,0,1)) }}
                            </div>
                        </td>
                        <td class="px-4 py-2 font-semibold text-blue-900">{{ $joueur->nom }}</td>
                        <td class="px-4 py-2">{{ $joueur->prenom }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block px-2 py-1 rounded-full text-xs font-bold {{
                                $joueur->poste === 'Pivot' ? 'bg-blue-200 text-blue-800' :
                                ($joueur->poste === 'Ailier' ? 'bg-orange-200 text-orange-800' :
                                ($joueur->poste === 'Arrière' ? 'bg-green-200 text-green-800' :
                                'bg-gray-200 text-gray-800'))
                            }}">
                                {{ $joueur->poste }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center font-mono text-lg">{{ $joueur->numero }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                {{ $joueur->equipe ? $joueur->equipe->nom : '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 flex flex-wrap gap-2">
                            <a href="{{ route('joueurs.show', $joueur) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-full shadow text-xs transition">Voir</a>
                            @if(auth()->user() && auth()->user()->role === 'admin')
                                <a href="{{ route('joueurs.edit', $joueur) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-full shadow text-xs transition">Modifier</a>
                                <form action="{{ route('joueurs.destroy', $joueur) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full shadow text-xs transition" onclick="return confirm('Supprimer ce joueur ?')">Supprimer</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-8 flex justify-center">
        {{ $joueurs->links() }}
    </div>
</div>
@endsection
