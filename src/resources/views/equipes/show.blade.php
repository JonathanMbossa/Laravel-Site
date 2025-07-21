@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-10 flex justify-center">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col items-center mb-6">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-400 to-blue-300 flex items-center justify-center text-white font-extrabold text-3xl shadow-lg mb-2">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#3B82F6"/><path d="M6 12 Q12 6 18 12 Q12 18 6 12 Z" fill="#fff" fill-opacity="0.3"/><path d="M12 2 V22" stroke="#fff" stroke-width="1.5"/><path d="M2 12 H22" stroke="#fff" stroke-width="1.5"/></svg>
            </div>
            <h2 class="text-3xl font-bold text-blue-900 mb-1">{{ $equipe->nom }}</h2>
            <div class="flex gap-2 mb-2">
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $equipe->ville }}</span>
                <span class="inline-block bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $equipe->joueurs->count() }} joueurs</span>
            </div>
        </div>
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Joueurs de l'équipe</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-lg">
                    <thead class="bg-blue-50">
                        <tr>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Nom</th>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Prénom</th>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Poste</th>
                            <th class="px-4 py-2 text-xs text-blue-900 uppercase">Numéro</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($equipe->joueurs as $joueur)
                            <tr class="hover:bg-blue-50 transition">
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
                                <td class="px-4 py-2 text-center font-mono">{{ $joueur->numero }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-gray-400">Aucun joueur dans cette équipe.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-between mt-8">
            <a href="{{ route('equipes.edit', $equipe) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2 rounded-full shadow font-semibold transition">Modifier</a>
            <a href="{{ route('equipes.index') }}" class="bg-blue-100 hover:bg-blue-200 text-blue-900 px-5 py-2 rounded-full shadow font-semibold transition">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
