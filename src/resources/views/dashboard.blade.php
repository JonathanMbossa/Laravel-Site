<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <div class="bg-blue-100 p-4 rounded shadow">
                            <div class="text-lg font-bold">Équipes</div>
                            <div class="text-3xl">{{ \App\Models\Equipe::count() }}</div>
                        </div>
                        <div class="bg-green-100 p-4 rounded shadow">
                            <div class="text-lg font-bold">Joueurs</div>
                            <div class="text-3xl">{{ \App\Models\Joueur::count() }}</div>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded shadow">
                            <div class="text-lg font-bold">Matchs</div>
                            <div class="text-3xl">{{ \App\Models\BasketMatch::count() }}</div>
                        </div>
                        <div class="bg-purple-100 p-4 rounded shadow">
                            <div class="text-lg font-bold">Statistiques</div>
                            <div class="text-3xl">{{ \App\Models\Statistique::count() }}</div>
                        </div>
                        <div class="bg-pink-100 p-4 rounded shadow">
                            <div class="text-lg font-bold">Entraîneurs</div>
                            <div class="text-3xl">{{ \App\Models\Entraineur::count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
