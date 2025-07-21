@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-10 flex justify-center">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col items-center mb-6">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-yellow-400 to-orange-400 flex items-center justify-center text-white font-extrabold text-3xl shadow-lg mb-2">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#F59E42"/><path d="M6 12 Q12 6 18 12 Q12 18 6 12 Z" fill="#fff" fill-opacity="0.3"/><path d="M12 2 V22" stroke="#fff" stroke-width="1.5"/><path d="M2 12 H22" stroke="#fff" stroke-width="1.5"/></svg>
            </div>
            <h2 class="text-3xl font-bold text-yellow-900 mb-1">Match du {{ $match->date }}</h2>
            <div class="flex gap-2 mb-2">
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $match->equipeDomicile ? $match->equipeDomicile->nom : '-' }}
                </span>
                <span class="inline-block bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $match->equipeExterieure ? $match->equipeExterieure->nom : '-' }}
                </span>
                <span class="inline-block bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-mono">Score : {{ $match->score_domicile }} - {{ $match->score_exterieur }}</span>
            </div>
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Statistiques du match</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-lg">
                    <thead class="bg-yellow-50">
                        <tr>
                            <th class="px-4 py-2 text-xs text-yellow-900 uppercase">Joueur</th>
                            <th class="px-4 py-2 text-xs text-yellow-900 uppercase">Points</th>
                            <th class="px-4 py-2 text-xs text-yellow-900 uppercase">Rebonds</th>
                            <th class="px-4 py-2 text-xs text-yellow-900 uppercase">Passes</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($match->statistiques as $stat)
                            <tr class="hover:bg-yellow-50 transition">
                                <td class="px-4 py-2 font-semibold text-yellow-900">{{ $stat->joueur ? $stat->joueur->nom : '-' }}</td>
                                <td class="px-4 py-2 text-center font-mono">{{ $stat->points }}</td>
                                <td class="px-4 py-2 text-center font-mono">{{ $stat->rebonds }}</td>
                                <td class="px-4 py-2 text-center font-mono">{{ $stat->passes }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-gray-400">Aucune statistique pour ce match.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-between mt-8">
            <a href="{{ route('basket_matches.edit', $match) }}" class="bg-blue-400 hover:bg-blue-500 text-white px-5 py-2 rounded-full shadow font-semibold transition">Modifier</a>
            <a href="{{ route('basket_matches.index') }}" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-900 px-5 py-2 rounded-full shadow font-semibold transition">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
