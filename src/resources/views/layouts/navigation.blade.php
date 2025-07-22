<nav x-data="{ open: false }" class="bg-blue-900 border-b border-white text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center me-4">
                    <a href="/home">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="20" fill="#F59E42"/>
                            <path d="M10 20 Q20 10 30 20 Q20 30 10 20 Z" fill="#fff" fill-opacity="0.3"/>
                            <path d="M20 0 V40" stroke="#fff" stroke-width="2"/>
                            <path d="M0 20 H40" stroke="#fff" stroke-width="2"/>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="/home" :active="request()->is('home')">
                        Accueil
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('equipes.index')" :active="request()->routeIs('equipes.*')">
                        Équipes
                    </x-nav-link>
                    <x-nav-link :href="route('joueurs.index')" :active="request()->routeIs('joueurs.*')">
                        Joueurs
                    </x-nav-link>
                    <x-nav-link :href="route('basket_matches.index')" :active="request()->routeIs('basket_matches.*')">
                        Matchs
                    </x-nav-link>
                    <x-nav-link :href="route('statistiques.index')" :active="request()->routeIs('statistiques.*')">
                        Statistiques
                    </x-nav-link>
                    <x-nav-link :href="route('entraineurs.index')" :active="request()->routeIs('entraineurs.*')">
                        Entraîneurs
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            @if(Auth::check())
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="/profile">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="/home" :active="request()->is('home')">
                Accueil
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('equipes.index')" :active="request()->routeIs('equipes.*')">
                Équipes
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('joueurs.index')" :active="request()->routeIs('joueurs.*')">
                Joueurs
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('basket_matches.index')" :active="request()->routeIs('basket_matches.*')">
                Matchs
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('statistiques.index')" :active="request()->routeIs('statistiques.*')">
                Statistiques
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('entraineurs.index')" :active="request()->routeIs('entraineurs.*')">
                Entraîneurs
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if(Auth::check())
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            @endif

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="/profile">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
