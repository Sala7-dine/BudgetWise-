<div x-data="{ showGoalModal: false }">
    <div id="tab-objectifs" class="tab-content hidden">
        <!-- En-tête avec bouton d'ajout -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Mes objectifs d'épargne</h2>
            <button @click="showGoalModal = true" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Nouvel objectif
            </button>
        </div>

        <!-- Grille des objectifs -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($goals as $goal)
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg hover:border-blue-500/50 transition-colors">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-1">{{ $goal->title }}</h3>
                            @if($goal->description)
                                <p class="text-sm text-gray-400">{{ $goal->description }}</p>
                            @endif
                        </div>
                        <form action="{{ route('goals.destroy', $goal) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-3xl font-bold text-white">{{ number_format($goal->current_amount, 0) }}</span>
                            <span class="text-gray-400">/ {{ number_format($goal->target_amount, 0) }} DH</span>
                        </div>
                        
                        <div class="w-full bg-gray-700 rounded-full h-3 mb-2">
                            <div class="bg-blue-500 h-3 rounded-full transition-all duration-500" 
                                 style="width: {{ $goal->progress }}%"></div>
                        </div>
                        
                        <div class="flex justify-between text-sm">
                            <span class="text-blue-400">{{ number_format($goal->progress, 1) }}%</span>
                            <span class="text-gray-400">{{ $goal->deadline->format('d M Y') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm text-gray-400">
                        <span>Épargne auto : {{ $goal->auto_save_percentage }}%</span>
                        <span>{{ $goal->deadline->diffForHumans() }}</span>
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                    <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700/50">
                        <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-gray-400 text-lg mb-4">Vous n'avez pas encore d'objectifs d'épargne</p>
                        <button @click="showGoalModal = true" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                            Créer mon premier objectif
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Modal d'ajout d'objectif -->
    <div x-show="showGoalModal" 
         class="fixed inset-0 bg-gray-900/80 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-gray-800 rounded-2xl p-6 w-full max-w-md border border-gray-700/50"
             @click.away="showGoalModal = false">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-white">Nouvel objectif d'épargne</h3>
                <button @click="showGoalModal = false" class="text-gray-400 hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form action="{{ route('goals.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Titre de l'objectif</label>
                    <input type="text" name="title"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description (optionnelle)</label>
                    <textarea name="description" rows="2"
                              class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Montant cible (DH)</label>
                        <input type="number" name="target_amount" step="0.01"
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Épargne auto (%)</label>
                        <input type="number" name="auto_save_percentage" min="0" max="100" step="0.01"
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                               value="0" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Date limite</label>
                    <input type="date" name="deadline"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                           required>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" @click="showGoalModal = false"
                            class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                        Créer l'objectif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
