<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête du tableau de bord -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-white">Tableau de bord</h1>
                <p class="text-gray-400 mt-2">Bienvenue, {{ Auth::user()->name }}. Voici l'état de vos finances.</p>
            </div>

            <!-- Résumé financier -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Carte Revenu restant -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-blue-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Revenu restant</h3>
                        <div class="w-10 h-10 bg-blue-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="text-3xl font-bold text-white mb-2">2,450 DH</div>
                        <div class="w-full bg-gray-700 rounded-full h-3 mb-2">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: 49%"></div>
                        </div>
                        <div class="flex justify-between text-xs text-gray-400">
                            <span>0 DH</span>
                            <span>5,000 DH</span>
                        </div>
                    </div>
                </div>

                <!-- Carte Total dépensé -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-purple-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Total dépensé</h3>
                        <div class="w-10 h-10 bg-purple-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="text-3xl font-bold text-white mb-2">2,550 DH</div>
                        <div class="flex items-center text-sm text-purple-400 mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            <span>+320 DH depuis le mois dernier</span>
                        </div>
                        <div class="relative h-12 w-full">
                            <svg viewBox="0 0 100 25" class="w-full h-full">
                                <path d="M0,25 L10,20 L20,22 L30,18 L40,15 L50,19 L60,17 L70,13 L80,10 L90,15 L100,5" fill="none" stroke="#9f7aea" stroke-width="2" class="transform transition-all duration-500"></path>
                                <path d="M0,25 L10,20 L20,22 L30,18 L40,15 L50,19 L60,17 L70,13 L80,10 L90,15 L100,5 L100,25 L0,25" fill="url(#purple-gradient)" stroke="none" opacity="0.2"></path>
                                <defs>
                                    <linearGradient id="purple-gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" stop-color="#9f7aea"></stop>
                                        <stop offset="100%" stop-color="#9f7aea" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Carte Prochain salaire -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-green-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Prochain salaire</h3>
                        <div class="w-10 h-10 bg-green-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="text-3xl font-bold text-white mb-2">5,000 DH</div>
                        <div class="flex items-center text-sm text-green-400 mb-2">
                            <span>Dans 8 jours (10 du mois)</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-3 mb-2">
                            <div class="bg-green-500 h-3 rounded-full" style="width: 73%"></div>
                        </div>
                        <div class="text-xs text-gray-400 text-right">73% du mois écoulé</div>
                    </div>
                </div>
            </div>

            <!-- Onglets de navigation -->
            <div class="mb-8 border-b border-gray-700">
                <div class="flex space-x-8">
                    <button onclick="switchTab('apercu')" class="tab-btn px-1 py-4 text-blue-400 border-b-2 border-blue-400 font-medium" data-tab="apercu">
                        Aperçu
                    </button>
                    <button onclick="switchTab('depenses')" class="tab-btn px-1 py-4 text-gray-400 hover:text-gray-300" data-tab="depenses">
                        Dépenses
                    </button>
                    <button onclick="switchTab('objectifs')" class="tab-btn px-1 py-4 text-gray-400 hover:text-gray-300" data-tab="objectifs">
                        Objectifs
                    </button>
                    <button onclick="switchTab('souhaits')" class="tab-btn px-1 py-4 text-gray-400 hover:text-gray-300" data-tab="souhaits">
                        Liste de souhaits
                    </button>
                </div>
            </div>

            <!-- Contenu des onglets -->
            <div id="tab-apercu" class="tab-content">
                <!-- Contenu de l'aperçu -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Suggestion IA -->
                    <div class="lg:col-span-2">
                        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg mb-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-blue-900/50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-2">Suggestion de MoneyMind IA</h3>
                                    <p class="text-gray-300 mb-4">Basé sur vos habitudes de dépenses, vous pourriez économiser jusqu'à <span class="text-blue-400 font-medium">450 DH</span> ce mois-ci en réduisant vos dépenses de divertissement de 20%.</p>
                                    <div class="flex space-x-3">
                                        <button class="px-4 py-2 bg-blue-600/20 text-blue-400 rounded-lg hover:bg-blue-600/30 transition-colors">
                                            Voir les détails
                                        </button>
                                        <button class="px-4 py-2 bg-gray-700/50 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors">
                                            Ignorer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Dépenses récentes -->
                        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-semibold text-white">Dépenses récentes</h3>
                                <button class="text-sm text-blue-400 hover:text-blue-300">Voir tout</button>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 hover:bg-gray-700/30 rounded-xl transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-blue-900/50 rounded-xl flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-white font-medium">Supermarché Marjane</div>
                                            <div class="text-sm text-gray-400">Nourriture • Aujourd'hui</div>
                                        </div>
                                    </div>
                                    <div class="text-white font-medium">-320 DH</div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 hover:bg-gray-700/30 rounded-xl transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-purple-900/50 rounded-xl flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-white font-medium">Cinéma Megarama</div>
                                            <div class="text-sm text-gray-400">Divertissement • Hier</div>
                                        </div>
                                    </div>
                                    <div class="text-white font-medium">-120 DH</div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 hover:bg-gray-700/30 rounded-xl transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-red-900/50 rounded-xl flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-white font-medium">Taxi</div>
                                            <div class="text-sm text-gray-400">Transport • 2 jours</div>
                                        </div>
                                    </div>
                                    <div class="text-white font-medium">-75 DH</div>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 hover:bg-gray-700/30 rounded-xl transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-green-900/50 rounded-xl flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-white font-medium">Vêtements Zara</div>
                                            <div class="text-sm text-gray-400">Shopping • 3 jours</div>
                                        </div>
                                    </div>
                                    <div class="text-white font-medium">-450 DH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <!-- Répartition des dépenses -->
                        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg mb-6">
                            <h3 class="text-lg font-semibold text-white mb-6">Répartition des dépenses</h3>
                            
                            <div class="relative h-48 mb-6">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg viewBox="0 0 100 100" class="w-full h-full">
                                        <!-- Segments du graphique -->
                                        <circle cx="50" cy="50" r="40" fill="transparent" stroke="#3b82f6" stroke-width="16" stroke-dasharray="75 100" stroke-dashoffset="25" />
                                        <circle cx="50" cy="50" r="40" fill="transparent" stroke="#8b5cf6" stroke-width="16" stroke-dasharray="50 100" stroke-dashoffset="100" />
                                        <circle cx="50" cy="50" r="40" fill="transparent" stroke="#ef4444" stroke-width="16" stroke-dasharray="35 100" stroke-dashoffset="150" />
                                        <circle cx="50" cy="50" r="40" fill="transparent" stroke="#10b981" stroke-width="16" stroke-dasharray="15 100" stroke-dashoffset="185" />
                                    </svg>
                                    <div class="absolute text-center">
                                        <div class="text-2xl font-bold text-white">2,550</div>
                                        <div class="text-sm text-gray-400">DH dépensés</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                        <span class="text-gray-300">Nourriture</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-white font-medium">765 DH</span>
                                        <span class="text-gray-400 text-sm">30%</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-purple-500 rounded-full mr-2"></div>
                                        <span class="text-gray-300">Divertissement</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-white font-medium">637 DH</span>
                                        <span class="text-gray-400 text-sm">25%</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                        <span class="text-gray-300">Transport</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-white font-medium">510 DH</span>
                                        <span class="text-gray-400 text-sm">20%</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                        <span class="text-gray-300">Autres</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-white font-medium">638 DH</span>
                                        <span class="text-gray-400 text-sm">25%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Objectifs d'épargne -->
                        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-semibold text-white">Objectifs d'épargne</h3>
                                <button class="text-sm text-blue-400 hover:text-blue-300">+ Ajouter</button>
                            </div>
                            
                            <div class="space-y-5">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-300">Téléphone</span>
                                        <span class="text-white font-medium">150 / 1500 DH</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2.5">
                                        <div class="bg-blue-500 h-2.5 rounded-full" style="width: 10%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-gray-400">
                                        <span>10%</span>
                                        <span>5 mois restants</span>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-300">Vacances</span>
                                        <span class="text-white font-medium">2000 / 5000 DH</span>
                                    </div>
                                    <div class="w-full bg-gray-700 rounded-full h-2.5">
                                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 40%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-gray-400">
                                        <span>40%</span>
                                        <span>3 mois restants</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Onglet Dépenses -->
            <div id="tab-depenses" class="tab-content hidden">
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg mb-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-white">Ajouter une dépense</h3>
                    </div>
                    
                    <form class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                            <input type="text" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Montant (DH)</label>
                            <input type="number" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Catégorie</label>
                            <select class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Nourriture</option>
                                <option>Transport</option>
                                <option>Divertissement</option>
                                <option>Shopping</option>
                            </select>
                        </div>
                        <div class="md:col-span-3">
                            <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition-colors">
                                Ajouter la dépense
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-white">Historique des dépenses</h3>
                        <div class="flex space-x-4">
                            <select class="px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Tous les mois</option>
                                <option>Ce mois</option>
                                <option>Mois dernier</option>
                            </select>
                            <select class="px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Toutes les catégories</option>
                                <option>Nourriture</option>
                                <option>Transport</option>
                                <option>Divertissement</option>
                            </select>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-400">Date</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-400">Description</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-400">Catégorie</th>
                                    <th class="px-4 py-3 text-right text-sm font-medium text-gray-400">Montant</th>
                                    <th class="px-4 py-3 text-right text-sm font-medium text-gray-400">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Exemple de ligne -->
                                <tr class="border-b border-gray-700 hover:bg-gray-700/30">
                                    <td class="px-4 py-4 text-gray-300">Aujourd'hui</td>
                                    <td class="px-4 py-4 text-white">Supermarché Marjane</td>
                                    <td class="px-4 py-4">
                                        <span class="px-2 py-1 bg-blue-900/20 text-blue-400 rounded-md text-xs">Nourriture</span>
                                    </td>
                                    <td class="px-4 py-4 text-right text-white font-medium">320 DH</td>
                                    <td class="px-4 py-4 text-right">
                                        <button class="text-blue-400 hover:text-blue-300">Modifier</button>
                                        <button class="text-red-400 hover:text-red-300 ml-3">Supprimer</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Onglet Objectifs -->
            <div id="tab-objectifs" class="tab-content hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-white">Nouvel objectif</h3>
                        </div>
                        
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Titre de l'objectif</label>
                                <input type="text" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Montant cible (DH)</label>
                                <input type="number" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Date limite</label>
                                <input type="date" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition-colors">
                                Créer l'objectif
                            </button>
                        </form>
                    </div>

                    <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-white">Progression des objectifs</h3>
                        </div>
                        
                        <div class="space-y-6">
                            <!-- Exemple d'objectif -->
                            <div class="p-4 bg-gray-700/50 rounded-xl">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="text-white font-medium">Fond d'urgence</h4>
                                        <p class="text-sm text-gray-400">Échéance: Décembre 2024</p>
                                    </div>
                                    <span class="text-white font-medium">5,000 / 10,000 DH</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2.5 mb-2">
                                    <div class="bg-green-500 h-2.5 rounded-full" style="width: 50%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-400">
                                    <span>50% atteint</span>
                                    <span>6 mois restants</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Onglet Liste de souhaits -->
            <div id="tab-souhaits" class="tab-content hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Formulaire d'ajout -->
                    <div class="md:col-span-3 bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg mb-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-white">Ajouter un souhait</h3>
                        </div>
                        
                        <form class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Article</label>
                                <input type="text" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Prix estimé (DH)</label>
                                <input type="number" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Priorité</label>
                                <select class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>Basse</option>
                                    <option>Moyenne</option>
                                    <option>Haute</option>
                                </select>
                            </div>
                            <div class="md:col-span-3">
                                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition-colors">
                                    Ajouter à la liste
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Cartes des souhaits -->
                    <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                        <div class="relative group">
                            <img src="/images/phone-example.jpg" alt="Smartphone" class="w-full h-48 object-cover rounded-xl mb-4">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent rounded-xl"></div>
                            <div class="absolute bottom-4 left-4">
                                <h4 class="text-white font-medium">iPhone 15</h4>
                                <p class="text-sm text-gray-300">12,000 DH</p>
                            </div>
                            <span class="absolute top-4 right-4 px-2 py-1 bg-red-500/20 text-red-400 rounded-lg text-xs">Priorité haute</span>
                        </div>
                        <div class="mt-4">
                            <div class="flex justify-between text-sm text-gray-400 mb-2">
                                <span>Progression</span>
                                <span>2,400 / 12,000 DH</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour le switch des onglets -->
    <script>
    function switchTab(tabName) {
        // Cacher tous les contenus
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Réinitialiser tous les boutons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('text-blue-400', 'border-b-2', 'border-blue-400');
            btn.classList.add('text-gray-400');
        });
        
        // Afficher le contenu sélectionné
        document.getElementById('tab-' + tabName).classList.remove('hidden');
        
        // Activer le bouton sélectionné
        const activeBtn = document.querySelector(`[data-tab="${tabName}"]`);
        activeBtn.classList.remove('text-gray-400');
        activeBtn.classList.add('text-blue-400', 'border-b-2', 'border-blue-400');
    }
    </script>
</x-app-layout>
