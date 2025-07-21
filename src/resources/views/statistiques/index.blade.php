@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header créatif -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div class="flex items-center gap-4">
            <div class="bg-green-400 rounded-full p-3 shadow-lg">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#34D399"/><path d="M6 12 Q12 6 18 12 Q12 18 6 12 Z" fill="#fff" fill-opacity="0.3"/><path d="M12 2 V22" stroke="#fff" stroke-width="1.5"/><path d="M2 12 H22" stroke="#fff" stroke-width="1.5"/></svg>
            </div>
<div>
                <h1 class="text-4xl font-extrabold text-green-900 mb-1">Statistiques</h1>
                <p class="text-gray-500">Toutes les performances des joueurs par match</p>
            </div>
        </div>
        <a href="{{ route('statistiques.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-400 to-blue-400 hover:from-green-500 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-xl transition transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Ajouter une statistique
        </a>
    </div>
    <!-- Statistiques rapides -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-green-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-green-800">{{ $statistiques->count() }}</div>
            <div class="text-xs text-green-700 uppercase">Statistiques</div>
        </div>
        <div class="bg-blue-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-blue-800">{{ $statistiques->unique('joueur_id')->count() }}</div>
            <div class="text-xs text-blue-700 uppercase">Joueurs concernés</div>
        </div>
        <div class="bg-yellow-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-yellow-700">{{ $statistiques->unique('basket_match_id')->count() }}</div>
            <div class="text-xs text-yellow-600 uppercase">Matchs concernés</div>
        </div>
    </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4 shadow">{{ session('success') }}</div>
    @endif
    <!-- Tableau créatif -->
    <div class="overflow-x-auto bg-white rounded-2xl shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-green-100 to-blue-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Joueur</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Match</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Points</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Rebonds</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Passes</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($statistiques as $stat)
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 font-semibold text-green-900">{{ $stat->joueur ? $stat->joueur->nom : '-' }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">
                                Match #{{ $stat->basket_match_id }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center font-mono text-lg">{{ $stat->points }}</td>
                        <td class="px-4 py-2 text-center font-mono text-lg">{{ $stat->rebonds }}</td>
                        <td class="px-4 py-2 text-center font-mono text-lg">{{ $stat->passes }}</td>
                        <td class="px-4 py-2 flex flex-wrap gap-2">
                            <a href="{{ route('statistiques.show', $stat) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-full shadow text-xs transition">Voir</a>
                            @if(auth()->user() && auth()->user()->role === 'admin')
                                <a href="{{ route('statistiques.edit', $stat) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-full shadow text-xs transition">Modifier</a>
                                <form action="{{ route('statistiques.destroy', $stat) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full shadow text-xs transition" onclick="return confirm('Supprimer cette statistique ?')">Supprimer</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
