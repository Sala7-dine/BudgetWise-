<!-- Sidebar -->
<aside class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-800 border-r border-gray-700/50 shadow-xl transition-transform duration-300 transform"
   >
    
    <!-- Logo et titre -->
    <div class="flex items-center h-16 px-6 border-b border-gray-700/50">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-blue-600/10 rounded-xl">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-xl font-bold text-white">MoneyMind</span>
        </div>
    </div>

    <!-- Menu principal -->
    <nav class="flex-1 overflow-y-auto">
        <div class="px-4 py-4">
            <!-- Profil utilisateur -->
            <div class="flex items-center px-2 py-3 mb-6 rounded-xl bg-gray-900/50">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-xl bg-blue-600/20 flex items-center justify-center text-blue-500 font-bold">
                        {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">{{ Auth::user()->name ?? 'Utilisateur' }}</p>
                    <p class="text-xs text-gray-400">Administrateur</p>
                </div>
            </div>

            <!-- Navigation -->
            <div class="space-y-1">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Navigation</p>
                
                <!-- Dashboard -->
                <a href="{{ route('admin') }}" 
                   class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ 
                       request()->routeIs('dashboard') 
                       ? 'bg-blue-600/10 text-blue-500' 
                       : 'text-gray-300 hover:bg-gray-700/50 hover:text-white'
                   }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Tableau de bord
                </a>

                <!-- Utilisateurs -->
                <a href="{{ route('admin.users.show') }}" 
                   class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ 
                       request()->is('users*') 
                       ? 'bg-blue-600/10 text-blue-500' 
                       : 'text-gray-300 hover:bg-gray-700/50 hover:text-white'
                   }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Utilisateurs
                </a>

                <!-- Catégories -->
                <a href="{{ route("admin.categories.index") }}" 
                   class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ 
                       request()->is('categories*') 
                       ? 'bg-blue-600/10 text-blue-500' 
                       : 'text-gray-300 hover:bg-gray-700/50 hover:text-white'
                   }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Catégories
                </a>

                <!-- Statistiques -->
                <a href="{{ url('/statistics') }}" 
                   class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ 
                       request()->is('statistics*') 
                       ? 'bg-blue-600/10 text-blue-500' 
                       : 'text-gray-300 hover:bg-gray-700/50 hover:text-white'
                   }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Statistiques
                </a>
            </div>

            <!-- Paramètres -->
            <div class="mt-8 space-y-1">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Paramètres</p>
                
                <!-- Configuration -->
                <a href="{{ url('/settings') }}" 
                   class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-colors {{ 
                       request()->is('settings*') 
                       ? 'bg-blue-600/10 text-blue-500' 
                       : 'text-gray-300 hover:bg-gray-700/50 hover:text-white'
                   }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Configuration
                </a>
            </div>
        </div>
    </nav>

    <!-- Déconnexion -->
    <div class="border-t border-gray-700/50 p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="flex items-center w-full px-3 py-2.5 rounded-xl text-sm font-medium text-red-400 hover:bg-red-600/10 hover:text-red-500 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Déconnexion
            </button>
        </form>
    </div>
</aside>


