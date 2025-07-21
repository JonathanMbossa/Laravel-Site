<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basket Club Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-orange-50 min-h-screen">
    <div class="min-h-screen flex flex-col items-center justify-center py-16">
        <div class="flex flex-col items-center gap-6 w-full max-w-4xl px-4">
            <!-- Illustration basket -->
            <div class="bg-orange-400 rounded-full p-8 shadow-lg mb-2">
                <svg width="96" height="96" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="12" fill="#F59E42"/>
                    <path d="M6 12 Q12 6 18 12 Q12 18 6 12 Z" fill="#fff" fill-opacity="0.3"/>
                    <path d="M12 2 V22" stroke="#fff" stroke-width="2"/>
                    <path d="M2 12 H22" stroke="#fff" stroke-width="2"/>
                </svg>
            </div>
            
            <h1 class="text-5xl font-extrabold text-blue-900 text-center drop-shadow-lg">Basket Club Manager</h1>
            <p class="text-lg text-gray-600 text-center max-w-2xl">Gérez vos équipes, joueurs, matchs et statistiques de basketball dans une interface moderne, colorée et agréable. Rejoignez la communauté des passionnés de basket !</p>
            
            <div class="flex flex-col sm:flex-row gap-4 mt-4">
                <a href="/login" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full shadow-xl transition transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H3m6-6v12m6-6a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Se connecter
                </a>
                <a href="/register" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-full shadow-xl transition transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    S'inscrire
                </a>
            </div>
            
            <!-- Section Découvrir -->
            <div class="mt-12 w-full">
                <h2 class="text-2xl font-bold text-blue-900 mb-6 text-center">Découvrir le club</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <a href="/equipes" class="group flex flex-col items-center bg-white rounded-xl shadow p-6 hover:bg-blue-50 transition">
                        <svg class="w-10 h-10 mb-2 text-blue-500 group-hover:text-blue-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M8 12h8M12 8v8"/>
                        </svg>
                        <span class="font-semibold text-blue-900">Équipes</span>
                    </a>
                    <a href="/joueurs" class="group flex flex-col items-center bg-white rounded-xl shadow p-6 hover:bg-orange-50 transition">
                        <svg class="w-10 h-10 mb-2 text-orange-500 group-hover:text-orange-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8v4l3 3"/>
                        </svg>
                        <span class="font-semibold text-orange-900">Joueurs</span>
                    </a>
                    <a href="/basket_matches" class="group flex flex-col items-center bg-white rounded-xl shadow p-6 hover:bg-yellow-50 transition">
                        <svg class="w-10 h-10 mb-2 text-yellow-500 group-hover:text-yellow-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M8 12h8"/>
                        </svg>
                        <span class="font-semibold text-yellow-900">Matchs</span>
                    </a>
                    <a href="/statistiques" class="group flex flex-col items-center bg-white rounded-xl shadow p-6 hover:bg-green-50 transition">
                        <svg class="w-10 h-10 mb-2 text-green-500 group-hover:text-green-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8v8M8 12h8"/>
                        </svg>
                        <span class="font-semibold text-green-900">Statistiques</span>
                    </a>
                    <a href="/entraineurs" class="group flex flex-col items-center bg-white rounded-xl shadow p-6 hover:bg-pink-50 transition">
                        <svg class="w-10 h-10 mb-2 text-pink-400 group-hover:text-pink-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8v8M8 12h8"/>
                        </svg>
                        <span class="font-semibold text-pink-900">Entraîneurs</span>
                    </a>
                </div>
            </div>
            
            <!-- Footer simple -->
            <footer class="mt-16 text-gray-400 text-sm text-center w-full">
                <hr class="mb-4">
                <div>Basket Club Manager &copy; {{ date('Y') }} — Créé avec ❤️ pour les passionnés de basket</div>
            </footer>
        </div>
    </div>
</body>
</html> 