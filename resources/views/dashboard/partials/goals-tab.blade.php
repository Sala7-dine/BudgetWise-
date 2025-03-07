<div id="tab-objectifs" class="tab-content hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Formulaire de nouvel objectif -->
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white">Nouvel objectif</h3>
            </div>
            
            <form action="{{ route('goals.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Titre de l'objectif</label>
                    <input type="text" 
                           name="title"
                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description (optionnelle)</label>
                    <textarea name="description" 
                              rows="2"
                              class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"></textarea>
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
                           name="deadline"
                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Pourcentage d'épargne automatique mensuelle
                        <span class="text-gray-400 text-xs">(% du salaire)</span>
                    </label>
                    <input type="number" 
                           name="auto_save_percentage"
                           min="0"
                           max="100"
                           step="0.01"
                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"
                           required
                           value="0">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition-colors">
                    Créer l'objectif
                </button>
            </form>
        </div>

        <!-- Liste des objectifs existants -->
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
            <h3 class="text-lg font-semibold text-white mb-6">Mes objectifs</h3>
            
            <div class="space-y-4">
                @forelse($goals as $goal)
                    <div class="p-4 bg-gray-700/50 rounded-xl">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="text-white font-medium">{{ $goal->title }}</h4>
                                @if($goal->description)
                                    <p class="text-sm text-gray-400">{{ $goal->description }}</p>
                                @endif
                            </div>
                            <div class="flex items-center space-x-2">
                                <form action="{{ route('goals.destroy', $goal) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <span class="text-white font-medium">
                                {{ number_format($goal->current_amount, 0) }} / {{ number_format($goal->target_amount, 0) }} DH
                            </span>
                        </div>
                        
                        <div class="w-full bg-gray-700 rounded-full h-2.5 mb-2">
                            <div class="bg-blue-500 h-2.5 rounded-full" 
                                 style="width: {{ $goal->progress }}%"></div>
                        </div>
                        
                        <div class="flex justify-between text-xs text-gray-400">
                            <span>{{ number_format($goal->progress, 1) }}% atteint</span>
                            <span>Date limite : {{ $goal->deadline->format('d/m/Y') }}</span>
                        </div>

                        <!-- Formulaire de mise à jour du montant -->
                        <form action="{{ route('goals.update', $goal) }}" 
                              method="POST" 
                              class="mt-3 flex space-x-2">
                            @csrf
                            @method('PATCH')
                            <input type="number" 
                                   name="target_amount" 
                                   value="{{ $goal->target_amount }}"
                                   step="0.01"
                                   class="flex-1 px-3 py-1 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm">
                            <button type="submit" 
                                    class="px-3 py-1 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
                                Mettre à jour
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="text-center text-gray-400">
                        Vous n'avez pas encore d'objectifs. Créez-en un pour commencer à épargner !
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
