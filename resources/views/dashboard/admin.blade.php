<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête du tableau de bord -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-white">Tableau de bord administrateur</h1>
                <p class="text-gray-400 mt-2">Gérez l'application MoneyMind et suivez les performances globales</p>
            </div>

            <!-- Cartes de statistiques principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Carte Utilisateurs -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-blue-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Utilisateurs</h3>
                        <div class="w-10 h-10 bg-blue-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="flex items-end justify-between relative">
                        <div>
                            <div class="text-3xl font-bold text-white">1,248</div>
                            <div class="text-sm text-green-400 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                <span>+12.5% ce mois</span>
                            </div>
                        </div>
                        
                        <div class="h-16 flex items-end space-x-1">
                            <div class="w-4 bg-blue-900/50 rounded-t-md h-6"></div>
                            <div class="w-4 bg-blue-900/50 rounded-t-md h-8"></div>
                            <div class="w-4 bg-blue-900/50 rounded-t-md h-10"></div>
                            <div class="w-4 bg-blue-900/50 rounded-t-md h-7"></div>
                            <div class="w-4 bg-blue-900/50 rounded-t-md h-9"></div>
                            <div class="w-4 bg-blue-600 rounded-t-md h-12"></div>
                            <div class="w-4 bg-blue-600 rounded-t-md h-16"></div>
                        </div>
                    </div>
                </div>

                <!-- Carte Revenu moyen -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-purple-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Revenu moyen</h3>
                        <div class="w-10 h-10 bg-purple-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="flex items-end justify-between relative">
                        <div>
                            <div class="text-3xl font-bold text-white">4,850 DH</div>
                            <div class="text-sm text-green-400 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                <span>+3.2% ce mois</span>
                            </div>
                        </div>
                        
                        <div class="relative h-16 w-24">
                            <svg viewBox="0 0 100 50" class="w-full h-full">
                                <path d="M0,50 L10,45 L20,48 L30,40 L40,42 L50,35 L60,30 L70,25 L80,20 L90,15 L100,10" fill="none" stroke="#7c3aed" stroke-width="2" class="transform transition-all duration-500"></path>
                                <path d="M0,50 L10,45 L20,48 L30,40 L40,42 L50,35 L60,30 L70,25 L80,20 L90,15 L100,10 L100,50 L0,50" fill="url(#purple-gradient)" stroke="none" opacity="0.2"></path>
                                <defs>
                                    <linearGradient id="purple-gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" stop-color="#7c3aed"></stop>
                                        <stop offset="100%" stop-color="#7c3aed" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Carte Économies totales -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-green-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Économies totales</h3>
                        <div class="w-10 h-10 bg-green-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="flex items-end justify-between relative">
                        <div>
                            <div class="text-3xl font-bold text-white">1.2M DH</div>
                            <div class="text-sm text-green-400 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                <span>+18.3% ce mois</span>
                            </div>
                        </div>
                        
                        <div class="w-16 h-16 rounded-full bg-gray-700 flex items-center justify-center relative">
                            <svg class="w-16 h-16" viewBox="0 0 36 36">
                                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#4ade80" stroke-width="3" stroke-dasharray="75, 100" stroke-linecap="round"></path>
                                <text x="18" y="20.5" text-anchor="middle" fill="white" font-size="8">75%</text>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Carte Catégories -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-red-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Catégories</h3>
                        <div class="w-10 h-10 bg-red-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="flex items-end justify-between relative">
                        <div>
                            <div class="text-3xl font-bold text-white">12</div>
                            <div class="text-sm text-blue-400 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Ajouter nouvelle</span>
                            </div>
                        </div>
                        
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-lg bg-blue-500 flex items-center justify-center text-xs font-bold text-white">D</div>
                            <div class="w-8 h-8 rounded-lg bg-green-500 flex items-center justify-center text-xs font-bold text-white">N</div>
                            <div class="w-8 h-8 rounded-lg bg-purple-500 flex items-center justify-center text-xs font-bold text-white">T</div>
                            <div class="w-8 h-8 rounded-lg bg-gray-700 flex items-center justify-center text-xs font-bold text-white">+9</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section principale avec onglets -->
            <div class="bg-gray-800 rounded-3xl border border-gray-700/50 shadow-xl overflow-hidden">
                <!-- Navigation par onglets -->
                <div class="flex border-b border-gray-700">
                    <button class="px-6 py-4 text-white bg-gray-700 font-medium">Utilisateurs</button>
                    <button class="px-6 py-4 text-gray-400 hover:text-white transition-colors">Catégories</button>
                    <button class="px-6 py-4 text-gray-400 hover:text-white transition-colors">Rapports</button>
                    <button class="px-6 py-4 text-gray-400 hover:text-white transition-colors">Paramètres</button>
                </div>

                <!-- Contenu de l'onglet -->
                <div class="p-6">
                    <!-- En-tête avec recherche et filtres -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 space-y-4 md:space-y-0">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher un utilisateur..." class="w-full md:w-80 bg-gray-700 border-0 rounded-xl py-3 pl-12 pr-4 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex space-x-3">
                            <div class="relative">
                                <select class="appearance-none bg-gray-700 border-0 rounded-xl py-3 pl-4 pr-10 text-white focus:ring-2 focus:ring-blue-500">
                                    <option>Tous les utilisateurs</option>
                                    <option>Actifs</option>
                                    <option>Inactifs</option>
                                    <option>Nouveaux</option>
                                </select>
                                <svg class="w-5 h-5 text-gray-400 absolute right-3 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            
                            <button class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-4 py-3 font-medium transition-colors flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Exporter
                            </button>
                        </div>
                    </div>

                    <!-- Tableau des utilisateurs -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Utilisateur</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Revenu</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Économies</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Statut</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Dernière activité</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                <!-- Utilisateur 1 -->
                                <tr class="hover:bg-gray-700/50 transition-colors">
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-xl bg-blue-600/20 flex items-center justify-center text-blue-500 font-bold">SM</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">Sarah Moussaid</div>
                                                <div class="text-sm text-gray-400">sarah.m@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white">6,500 DH</div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-700 rounded-full h-2 mr-2">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: 65%"></div>
                                            </div>
                                            <span class="text-sm text-white">65%</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-md bg-green-900/20 text-green-400">Actif</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">
                                        Il y a 2 heures
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-blue-400 hover:text-blue-300 mr-3">Voir</button>
                                        <button class="text-red-400 hover:text-red-300">Supprimer</button>
                                    </td>
                                </tr>
                                
                                <!-- Utilisateur 2 -->
                                <tr class="hover:bg-gray-700/50 transition-colors">
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-xl bg-purple-600/20 flex items-center justify-center text-purple-500 font-bold">KA</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">Karim Alami</div>
                                                <div class="text-sm text-gray-400">karim.a@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white">4,200 DH</div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-700 rounded-full h-2 mr-2">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: 32%"></div>
                                            </div>
                                            <span class="text-sm text-white">32%</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-md bg-yellow-900/20 text-yellow-400">Inactif</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">
                                        Il y a 5 jours
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-blue-400 hover:text-blue-300 mr-3">Voir</button>
                                        <button class="text-red-400 hover:text-red-300">Supprimer</button>
                                    </td>
                                </tr>
                                
                                <!-- Utilisateur 3 -->
                                <tr class="hover:bg-gray-700/50 transition-colors">
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-xl bg-green-600/20 flex items-center justify-center text-green-500 font-bold">LB</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">Leila Bennani</div>
                                                <div class="text-sm text-gray-400">leila.b@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white">8,100 DH</div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-700 rounded-full h-2 mr-2">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: 78%"></div>
                                            </div>
                                            <span class="text-sm text-white">78%</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-md bg-green-900/20 text-green-400">Actif</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-300">
                                        Aujourd'hui
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-blue-400 hover:text-blue-300 mr-3">Voir</button>
                                        <button class="text-red-400 hover:text-red-300">Supprimer</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-400">
                            Affichage de 1 à 3 sur 48 utilisateurs
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-2 rounded-lg bg-gray-700 text-gray-400 hover:bg-gray-600 transition-colors">Précédent</button>
                            <button class="px-3 py-2 rounded-lg bg-blue-600 text-white">1</button>
                            <button class="px-3 py-2 rounded-lg bg-gray-700 text-gray-400 hover:bg-gray-600 transition-colors">2</button>
                            <button class="px-3 py-2 rounded-lg bg-gray-700 text-gray-400 hover:bg-gray-600 transition-colors">3</button>
                            <button class="px-3 py-2 rounded-lg bg-gray-700 text-gray-400 hover:bg-gray-600 transition-colors">Suivant</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
