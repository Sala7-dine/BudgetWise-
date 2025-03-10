<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête du tableau de bord -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-white">Tableau de bord administrateur</h1>
                <p class="text-gray-400 mt-2">Gérez l'application BudgetWise et suivez les performances globales</p>
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
                            <div class="text-3xl font-bold text-white">{{ number_format($stats['users']['total']) }}</div>
                            <div class="text-sm text-green-400 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                <span>{{ number_format($stats['users']['growthRate'], 1) }}% ce mois</span>
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
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-600/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2 group-hover:bg-green-600/20 transition-all duration-500"></div>
                    
                    <div class="flex items-center justify-between mb-4 relative">
                        <h3 class="text-lg font-medium text-gray-300">Revenu moyen</h3>
                        <div class="w-10 h-10 bg-green-900/50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="flex items-end justify-between relative">
                        <div>
                            <div class="text-3xl font-bold text-white">{{ number_format($stats['financial']['averageSalary']) }} DH</div>
                            <div class="text-sm text-gray-400 mt-1">Par utilisateur / mois</div>
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
                            <div class="text-3xl font-bold text-white">{{ number_format($stats['financial']['totalTransactions']) }} DH</div>
                            <div class="text-sm text-gray-400 mt-1">
                                Ce mois : {{ number_format($stats['financial']['monthlyTransactions']) }} DH
                            </div>
                            <div class="text-sm text-{{ $stats['financial']['transactionGrowth'] >= 0 ? 'green' : 'red' }}-400 flex items-center mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M{{ $stats['financial']['transactionGrowth'] >= 0 ? '5 10l7-7m0 0l7 7m-7-7v18' : '19 14l-7 7m0 0l-7-7m7 7V3' }}"/>
                                </svg>
                                <span>{{ number_format(abs($stats['financial']['transactionGrowth']), 1) }}% ce mois</span>
                            </div>
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
                            <div class="text-3xl font-bold text-white">{{ $stats['categories']['total'] }}</div>
                            <div class="text-sm text-gray-400 mt-1">Plus utilisée : {{ $stats['categories']['mostUsed']->name }}</div>
                            <div class="text-sm text-purple-400 mt-1">
                                {{ number_format($stats['categories']['mostUsed']->expenses_count) }} transactions
                            </div>
                        </div>
                        
                        <div class="flex -space-x-2">
                            @foreach($stats['categories']['stats']->take(3) as $category)
                                <div class="w-8 h-8 rounded-lg bg-{{ $category->color ?? 'gray' }}-500 flex items-center justify-center text-xs font-bold text-white">
                                    {{ substr($category->name, 0, 1) }}
                                </div>
                            @endforeach
                            @if($stats['categories']['total'] > 3)
                                <div class="w-8 h-8 rounded-lg bg-gray-700 flex items-center justify-center text-xs font-bold text-white">
                                    +{{ $stats['categories']['total'] - 3 }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section principale avec onglets -->
            <div class="bg-gray-800 rounded-3xl border border-gray-700/50 shadow-xl overflow-hidden">
                <!-- Navigation par onglets -->
                <div class="flex border-b border-gray-700">
                    <button onclick="switchAdminTab('users')" class="tab-btn px-6 py-4 text-gray-400 hover:text-white transition-colors">Utilisateurs</button>
                    <button onclick="switchAdminTab('categories')" class="tab-btn px-6 py-4 text-gray-400 hover:text-white transition-colors">Catégories</button>
                    <button onclick="switchAdminTab('statistics')" class="tab-btn px-6 py-4 text-white bg-gray-700 font-medium">Statistiques</button>
                </div>

                <!-- Contenu des onglets -->
                <div id="tab-statistics" class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Graphique des utilisateurs -->
                        <div class="bg-gray-700/50 rounded-2xl p-6">
                            <h3 class="text-lg font-medium text-white mb-4">Évolution des utilisateurs</h3>
                            <div class="h-80">
                                <canvas id="usersChart"></canvas>
                            </div>
                        </div>

                        <!-- Graphique des transactions -->
                        <div class="bg-gray-700/50 rounded-2xl p-6">
                            <h3 class="text-lg font-medium text-white mb-4">Volume des transactions</h3>
                            <div class="h-80">
                                <canvas id="transactionsChart"></canvas>
                            </div>
                        </div>

                        <!-- Distribution des catégories -->
                        <div class="bg-gray-700/50 rounded-2xl p-6">
                            <h3 class="text-lg font-medium text-white mb-4">Distribution des catégories</h3>
                            <div class="h-80">
                                <canvas id="categoriesChart"></canvas>
                            </div>
                        </div>

                        <!-- Tendances d'épargne -->
                        <div class="bg-gray-700/50 rounded-2xl p-6">
                            <h3 class="text-lg font-medium text-white mb-4">Tendances d'épargne</h3>
                            <div class="h-80">
                                <canvas id="savingsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

              
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function initCharts() {
        // Configuration commune
        const commonOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(255, 255, 255, 0.7)'
                    }
                }
            },
            scales: {
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.7)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.7)'
                    }
                }
            }
        };

        // Graphique des utilisateurs
        new Chart(document.getElementById('usersChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($stats['monthlyGrowth'])) !!},
                datasets: [{
                    label: 'Nouveaux utilisateurs',
                    data: {!! json_encode(array_values($stats['monthlyGrowth'])) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: commonOptions
        });

        // Graphique des transactions
        new Chart(document.getElementById('transactionsChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Volume des transactions',
                    data: [30000, 45000, 38000, 52000, 48000, 60000],
                    backgroundColor: 'rgba(139, 92, 246, 0.8)'
                }]
            },
            options: commonOptions
        });

        // Distribution des catégories
        new Chart(document.getElementById('categoriesChart'), {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($stats['categories']['stats']->pluck('name')) !!},
                datasets: [{
                    data: {!! json_encode($stats['categories']['stats']->pluck('expenses_count')) !!},
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(245, 158, 11, 0.8)'
                    ]
                }]
            },
            options: {
                ...commonOptions,
                cutout: '70%'
            }
        });

        // Tendances d'épargne
        new Chart(document.getElementById('savingsChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Moyenne des économies',
                    data: [5000, 7000, 6500, 8000, 9500, 11000],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: commonOptions
        });
    }

    // Initialisation des graphiques au chargement
    document.addEventListener('DOMContentLoaded', initCharts);

    // Fonction de changement d'onglet
    function switchAdminTab(tabId) {
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('text-white', 'bg-gray-700', 'font-medium');
            btn.classList.add('text-gray-400');
        });

        const activeBtn = document.querySelector(`[onclick="switchAdminTab('${tabId}')"]`);
        activeBtn.classList.remove('text-gray-400');
        activeBtn.classList.add('text-white', 'bg-gray-700', 'font-medium');
    }
</script>
@endpush
