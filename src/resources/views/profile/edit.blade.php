<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Fiche utilisateur visuelle -->
            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center gap-6 mb-6">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-400 to-orange-400 flex items-center justify-center text-white font-extrabold text-2xl shadow">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>
                <div>
                    <div class="text-lg font-bold text-blue-900">{{ Auth::user()->name }}</div>
                    <div class="text-gray-600">{{ Auth::user()->email }}</div>
                    <div class="mt-1">
                        <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                            Rôle : {{ Auth::user()->role ?? 'user' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
