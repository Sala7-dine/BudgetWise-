<div id="tab-souhaits" class="tab-content hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Formulaire d'ajout de souhait -->
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-white">Nouveau souhait</h3>
            </div>
            
            <form action="{{ route('wishes.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Titre</label>
                    <input type="text" 
                        name="title" 
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white" 
                        required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description (optionnelle)</label>
                    <textarea name="description" 
                            rows="3" 
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white"></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Coût estimé (DH)</label>
                    <input type="number" 
                        name="estimated_cost" 
                        min="0"
                        step="0.01"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white" 
                        required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Priorité</label>
                    <select name="priority" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white" required>
                        <option value="low">Faible</option>
                        <option value="medium" selected>Moyenne</option>
                        <option value="high">Élevée</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Montant épargné (DH)</label>
                    <input type="number" 
                        name="saved_amount" 
                        min="0"
                        step="0.01"
                        value="0"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-xl text-white" 
                        required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Pourcentage d'épargne automatique
                        <span class="text-gray-400 text-xs">(% du revenu restant)</span>
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

                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-xl">
                    Ajouter à ma liste
                </button>
            </form>
        </div>

        <!-- Liste des souhaits -->
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg">
            <h3 class="text-lg font-semibold text-white mb-6">Mes souhaits</h3>
            
            <div class="space-y-4">
                @forelse($wishes as $wish)
                    <div class="border border-gray-700 rounded-xl p-4 hover:bg-gray-700/30">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-medium text-white">{{ $wish->title }}</h4>
                            <div class="flex space-x-2">
                                @if($wish->priority === 'high')
                                    <span class="px-2 py-1 bg-red-900/20 text-red-400 rounded text-xs">Priorité élevée</span>
                                @elseif($wish->priority === 'medium')
                                    <span class="px-2 py-1 bg-yellow-900/20 text-yellow-400 rounded text-xs">Priorité moyenne</span>
                                @else
                                    <span class="px-2 py-1 bg-green-900/20 text-green-400 rounded text-xs">Priorité faible</span>
                                @endif
                                
                                @if($wish->status === 'achieved')
                                    <span class="px-2 py-1 bg-green-900/20 text-green-400 rounded text-xs">Réalisé</span>
                                @elseif($wish->status === 'cancelled')
                                    <span class="px-2 py-1 bg-red-900/20 text-red-400 rounded text-xs">Annulé</span>
                                @else
                                    <span class="px-2 py-1 bg-blue-900/20 text-blue-400 rounded text-xs">En cours</span>
                                @endif
                            </div>
                        </div>
                        
                        @if($wish->description)
                            <p class="text-gray-400 text-sm mb-3">{{ $wish->description }}</p>
                        @endif
                        
                        <div class="mb-2">
                            <div class="flex justify-between items-center text-sm mb-1">
                                <span class="text-gray-400">Progression</span>
                                <span class="text-white font-medium">{{ round(($wish->saved_amount / $wish->estimated_cost) * 100) }}%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($wish->saved_amount / $wish->estimated_cost) * 100 }}%"></div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-400 text-sm">Coût estimé</span>
                            <span class="text-white font-medium">{{ number_format($wish->estimated_cost, 2) }} DH</span>
                        </div>
                        
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-400 text-sm">Épargné</span>
                            <span class="text-white font-medium">{{ number_format($wish->saved_amount, 2) }} DH</span>
                        </div>
                        
                        @if($wish->status === 'pending')
                            <form action="{{ route('wishes.update', $wish) }}" method="POST" class="flex space-x-2">
                                @csrf
                                @method('PUT')
                                <input type="number" 
                                    name="saved_amount" 
                                    min="0"
                                    max="{{ $wish->estimated_cost }}"
                                    step="0.01"
                                    value="{{ $wish->saved_amount }}"
                                    class="w-full px-3 py-1 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm"
                                    required>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-1 px-3 rounded-lg">
                                    Mettre à jour
                                </button>
                            </form>
                            
                            <div class="flex justify-between mt-4">
                                <form action="{{ route('wishes.update', $wish) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="achieved">
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-1 px-3 rounded-lg">
                                        Marquer comme réalisé
                                    </button>
                                </form>
                                
                                <form action="{{ route('wishes.update', $wish) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-1 px-3 rounded-lg">
                                        Annuler
                                    </button>
                                </form>
                                
                                <form action="{{ route('wishes.destroy', $wish) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-gray-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-400">Vous n'avez pas encore ajouté de souhaits.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
