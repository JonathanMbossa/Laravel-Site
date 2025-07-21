@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-10 flex justify-center">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col items-center mb-6">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-orange-400 to-yellow-300 flex items-center justify-center text-white font-extrabold text-3xl shadow-lg mb-2">
                {{ strtoupper(substr($joueur->prenom,0,1)) }}{{ strtoupper(substr($joueur->nom,0,1)) }}
            </div>
            <h2 class="text-3xl font-bold text-blue-900 mb-1">{{ $joueur->prenom }} {{ $joueur->nom }}</h2>
            <div class="flex gap-2 mb-2">
                <span class="inline-block px-3 py-1 rounded-full text-sm font-bold {{
                    $joueur->poste === 'Pivot' ? 'bg-blue-200 text-blue-800' :
                    ($joueur->poste === 'Ailier' ? 'bg-orange-200 text-orange-800' :
                    ($joueur->poste === 'Arrière' ? 'bg-green-200 text-green-800' :
                    'bg-gray-200 text-gray-800'))
                }}">
                    {{ $joueur->poste }}
                </span>
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $joueur->equipe ? $joueur->equipe->nom : '-' }}
                </span>
                <span class="inline-block bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-mono">#{{ $joueur->numero }}</span>
            </div>
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Statistiques du joueur</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-lg">
                    <thead class="bg-blue-50">
                        <tr>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Match</th>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Points</th>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Rebonds</th>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Passes</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($joueur->statistiques as $stat)
                            <tr class="hover:bg-orange-50 transition">
                                <td class="px-4 py-2">Match #{{ $stat->basket_match_id }}</td>
                                <td class="px-4 py-2 text-center font-mono">{{ $stat->points }}</td>
                                <td class="px-4 py-2 text-center font-mono">{{ $stat->rebonds }}</td>
                                <td class="px-4 py-2 text-center font-mono">{{ $stat->passes }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-gray-400">Aucune statistique pour ce joueur.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-between mt-8">
            <a href="{{ route('joueurs.edit', $joueur) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2 rounded-full shadow font-semibold transition">Modifier</a>
            <a href="{{ route('joueurs.index') }}" class="bg-blue-100 hover:bg-blue-200 text-blue-900 px-5 py-2 rounded-full shadow font-semibold transition">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
