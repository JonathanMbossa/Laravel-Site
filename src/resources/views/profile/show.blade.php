@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-10 flex justify-center">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col items-center mb-6">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-400 to-orange-400 flex items-center justify-center text-white font-extrabold text-3xl shadow-lg mb-2">
                {{ strtoupper(substr($user->name,0,1)) }}
            </div>
            <h2 class="text-3xl font-bold text-blue-900 mb-1">{{ $user->name }}</h2>
            <div class="flex flex-col items-center gap-2 mb-2">
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $user->email }}</span>
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">Rôle : {{ $user->role ?? 'user' }}</span>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-12">
            <a href="{{ url('/profile/edit') }}" class="flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2 rounded-full shadow font-semibold transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828A2 2 0 019 17H7v-2a2 2 0 01.586-1.414z"/></svg>
                Modifier mon profil
            </a>
            <a href="{{ url('/home') }}" class="flex items-center gap-2 bg-blue-100 hover:bg-blue-200 text-blue-900 px-5 py-2 rounded-full shadow font-semibold transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/></svg>
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection 