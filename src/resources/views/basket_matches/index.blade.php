@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header créatif -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div class="flex items-center gap-4">
            <div class="bg-yellow-400 rounded-full p-3 shadow-lg">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#F59E42"/><path d="M6 12 Q12 6 18 12 Q12 18 6 12 Z" fill="#fff" fill-opacity="0.3"/><path d="M12 2 V22" stroke="#fff" stroke-width="1.5"/><path d="M2 12 H22" stroke="#fff" stroke-width="1.5"/></svg>
            </div>
<div>
                <h1 class="text-4xl font-extrabold text-yellow-900 mb-1">Matchs</h1>
                <p class="text-gray-500">Tous les matchs de la saison</p>
            </div>
        </div>
        <a href="{{ route('basket_matches.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-orange-400 hover:from-yellow-500 hover:to-orange-500 text-white font-bold py-3 px-6 rounded-full shadow-xl transition transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Ajouter un match
        </a>
    </div>
    <!-- Statistiques rapides -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-yellow-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-yellow-800">{{ $matches->count() }}</div>
            <div class="text-xs text-yellow-700 uppercase">Matchs</div>
        </div>
        <div class="bg-blue-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-blue-800">{{ $matches->unique('equipe_domicile_id')->count() + $matches->unique('equipe_exterieure_id')->count() }}</div>
            <div class="text-xs text-blue-700 uppercase">Équipes impliquées</div>
        </div>
        <div class="bg-green-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="text-2xl font-bold text-green-700">{{ $matches->where('score_domicile', '!=', null)->count() }}</div>
            <div class="text-xs text-green-600 uppercase">Matchs joués</div>
        </div>
    </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4 shadow">{{ session('success') }}</div>
    @endif
    <!-- Tableau créatif -->
    <div class="overflow-x-auto bg-white rounded-2xl shadow-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-yellow-100 to-yellow-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold text-yellow-900 uppercase tracking-wider">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-yellow-900 uppercase tracking-wider">Domicile</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-yellow-900 uppercase tracking-wider">Extérieur</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-yellow-900 uppercase tracking-wider">Score</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-yellow-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($matches as $match)
                    <tr class="hover:bg-yellow-50 transition">
                        <td class="px-4 py-2 font-semibold text-yellow-900">{{ $match->date }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                {{ $match->equipeDomicile ? $match->equipeDomicile->nom : '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span class="inline-block bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-semibold">
                                {{ $match->equipeExterieure ? $match->equipeExterieure->nom : '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center font-mono text-lg">{{ $match->score_domicile }} - {{ $match->score_exterieur }}</td>
                        <td class="px-4 py-2 flex flex-wrap gap-2">
                            <a href="{{ route('basket_matches.show', $match) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-full shadow text-xs transition">Voir</a>
                            @if(auth()->user() && auth()->user()->role === 'admin')
                                <a href="{{ route('basket_matches.edit', $match) }}" class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-full shadow text-xs transition">Modifier</a>
                                <form action="{{ route('basket_matches.destroy', $match) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full shadow text-xs transition" onclick="return confirm('Supprimer ce match ?')">Supprimer</button>
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
