@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-10 flex justify-center">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col items-center mb-6">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-pink-400 to-pink-300 flex items-center justify-center text-white font-extrabold text-3xl shadow-lg mb-2">
                <svg width="36" height="36" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#F472B6"/><path d="M6 12 Q12 6 18 12 Q12 18 6 12 Z" fill="#fff" fill-opacity="0.3"/><path d="M12 2 V22" stroke="#fff" stroke-width="1.5"/><path d="M2 12 H22" stroke="#fff" stroke-width="1.5"/></svg>
            </div>
            <h2 class="text-3xl font-bold text-pink-900 mb-1">{{ $entraineur->nom }}</h2>
            <div class="flex gap-2 mb-2">
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $entraineur->equipe ? $entraineur->equipe->nom : '-' }}
                </span>
            </div>
        </div>
        <div class="flex justify-between mt-8">
            <a href="{{ route('entraineurs.edit', $entraineur) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2 rounded-full shadow font-semibold transition">Modifier</a>
            <a href="{{ route('entraineurs.index') }}" class="bg-pink-100 hover:bg-pink-200 text-pink-900 px-5 py-2 rounded-full shadow font-semibold transition">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
