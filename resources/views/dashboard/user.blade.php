<x-main-layout>
    <div x-data="{ 
        showSalaryModal: false,
        showRecurringModal: false,
        frequency: 'monthly'
    }">
        <!-- En-tête avec le bouton -->
        <div class="py-12 bg-gray-900 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Bouton qui ouvre le modal -->
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Tableau de bord</h1>
                        <p class="text-gray-400 mt-2">Bienvenue, {{ Auth::user()->name }}.</p>
                    </div>
                    
                    <button @click="showSalaryModal = true" 
                            class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-xl transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Modifier le salaire
                    </button>
                    <button @click="showRecurringModal = true" 
                            class="px-4 py-2 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Dépense récurrente
                    </button>
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
                            <div class="text-3xl font-bold text-white mb-2">{{ number_format($remainingBudget, 0) }} DH</div>
                            <div class="w-full bg-gray-700 rounded-full h-3 mb-2">
                                <div class="bg-blue-500 h-3 rounded-full" style="width: {{ 100 - $budgetPercentage }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-400">
                                <span>0 DH</span>
                                <span>{{ number_format($salary, 0) }} DH</span>
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
                            <div class="text-3xl font-bold text-white mb-2">{{ number_format($monthlyExpenses, 0) }} DH</div>
                            <div class="flex items-center text-sm text-purple-400 mb-2">
                                <span>{{ number_format($budgetPercentage, 1) }}% du budget mensuel</span>
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
                            <div class="text-3xl font-bold text-white mb-2">{{ number_format($salary, 0) }} DH</div>
                            <div class="flex items-center text-sm text-green-400 mb-2">
                                @if($nextSalaryDate)
                                    <span>Dans {{ $daysUntilSalary }} jours ({{ $nextSalaryDate->format('d') }} du mois)</span>
                                @else
                                    <span>Date de versement non définie</span>
                                @endif
                            </div>
                            @if($nextSalaryDate)
                                <div class="w-full bg-gray-700 rounded-full h-3 mb-2">
                                    <div class="bg-green-500 h-3 rounded-full" style="width: {{ (30 - $daysUntilSalary) / 30 * 100 }}%"></div>
                                </div>
                                <div class="text-xs text-gray-400 text-right">{{ floor((30 - $daysUntilSalary) / 30 * 100) }}% du mois écoulé</div>
                            @endif
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
                        
                        <form action="{{ route('expenses.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                                <input type="text" 
                                       name="description" 
                                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                                       required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Montant (DH)</label>
                                <input type="number" 
                                       name="amount" 
                                       step="0.01"
                                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                                       required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Catégorie</label>
                                <select name="category_id" 
                                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                                        required>
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="md:col-span-3">
                                <button type="submit" 
                                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition-colors">
                                    Ajouter la dépense
                                </button>
                            </div>
                        </form>
                    </div>

                    @include('dashboard.partials.expenses-table')
                </div>

                <!-- Onglet Objectifs -->
                <div id="tab-objectifs" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Formulaire de nouvel objectif -->
                        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-semibold text-white">Nouvel objectif</h3>
                            </div>
                            
                            <form action="" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Titre de l'objectif</label>
                                    <input type="text" 
                                           name="title"
                                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                                           required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Montant cible (DH)</label>
                                    <input type="number" 
                                           name="target_amount"
                                           step="0.01"
                                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                                           required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Date limite</label>
                                    <input type="date" 
                                           name="target_date"
                                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                                           required>
                                </div>

                                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition-colors">
                                    Créer l'objectif
                                </button>
                            </form>
                        </div>

                        <!-- Liste des objectifs -->
                        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
                            <h3 class="text-lg font-semibold text-white mb-6">Progression des objectifs</h3>
                            <!-- ...reste du code... -->
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

        <!-- Modal (à l'extérieur du contenu principal mais à l'intérieur du div avec x-data) -->
        <div x-show="showSalaryModal" 
             class="fixed inset-0 bg-gray-900/80 z-50 flex items-center justify-center"
             x-cloak>
            <div class="bg-gray-800 rounded-2xl p-6 w-full max-w-md border border-gray-700/50">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-white">Modifier votre salaire</h3>
                    <button @click="showSalaryModal = false" class="text-gray-400 hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                <form action="{{ route('user.salary.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Montant mensuel (DH)</label>
                            <input type="number" 
                                   name="amount" 
                                   value="{{ auth()->user()->salary ?? 0 }}"
                                   class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Jour de versement</label>
                            <input type="number" 
                                   name="salary_day" 
                                   value="{{ auth()->user()->salary_day ?? 1 }}"
                                   min="1" 
                                   max="31"
                                   class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white">
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" 
                                @click="showSalaryModal = false"
                                class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                            Annuler
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>    
        
        <!-- Inclure le modal des dépenses récurrentes -->
        @include('dashboard.partials.modals.recurring-expense')
        <!-- Inclure le modal du salaire -->
        @include('dashboard.partials.modals.salary-modal')
    </div>
</x-main-layout>

<script>
    function switchTab(tabId) {
        // Cacher tous les contenus des onglets
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });

        // Réinitialiser tous les styles des boutons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('text-blue-400', 'border-b-2', 'border-blue-400', 'font-medium');
            btn.classList.add('text-gray-400');
        });

        // Afficher le contenu de l'onglet sélectionné
        document.getElementById(`tab-${tabId}`).classList.remove('hidden');

        // Mettre à jour le style du bouton sélectionné
        const activeButton = document.querySelector(`[data-tab="${tabId}"]`);
        activeButton.classList.remove('text-gray-400');
        activeButton.classList.add('text-blue-400', 'border-b-2', 'border-blue-400', 'font-medium');
    }

    // Initialiser l'onglet par défaut au chargement de la page
    document.addEventListener('DOMContentLoaded', () => {
        switchTab('apercu');
    });
</script>