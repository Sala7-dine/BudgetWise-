<div x-data="{ showWishModal: false }">
    <div id="tab-souhaits" class="tab-content hidden">
        <!-- En-tête avec bouton d'ajout -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Ma liste de souhaits</h2>
            <button @click="showWishModal = true" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Nouveau souhait
            </button>
        </div>

        <!-- Grille des souhaits -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($wishes as $wish)
                <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg hover:border-blue-500/50 transition-colors">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-1">{{ $wish->title }}</h3>
                            <div class="flex space-x-2 mb-2">
                                <span class="px-2 py-1 {{ $wish->priority === 'high' ? 'bg-red-900/20 text-red-400' : ($wish->priority === 'medium' ? 'bg-yellow-900/20 text-yellow-400' : 'bg-green-900/20 text-green-400') }} rounded text-xs">
                                    Priorité {{ $wish->priority === 'high' ? 'élevée' : ($wish->priority === 'medium' ? 'moyenne' : 'faible') }}
                                </span>
                                <span class="px-2 py-1 {{ $wish->status === 'achieved' ? 'bg-green-900/20 text-green-400' : ($wish->status === 'cancelled' ? 'bg-red-900/20 text-red-400' : 'bg-blue-900/20 text-blue-400') }} rounded text-xs">
                                    {{ $wish->status === 'achieved' ? 'Réalisé' : ($wish->status === 'cancelled' ? 'Annulé' : 'En cours') }}
                                </span>
                            </div>
                            @if($wish->description)
                                <p class="text-sm text-gray-400">{{ $wish->description }}</p>
                            @endif
                        </div>
                        @if($wish->status === 'pending')
                            <form action="{{ route('wishes.destroy', $wish) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-3xl font-bold text-white">{{ number_format($wish->saved_amount, 0) }}</span>
                            <span class="text-gray-400">/ {{ number_format($wish->estimated_cost, 0) }} DH</span>
                        </div>
                        
                        <div class="w-full bg-gray-700 rounded-full h-3 mb-2">
                            <div class="bg-blue-500 h-3 rounded-full transition-all duration-500" 
                                 style="width: {{ ($wish->saved_amount / $wish->estimated_cost) * 100 }}%"></div>
                        </div>
                        
                        <div class="flex justify-between text-sm">
                            <span class="text-blue-400">{{ number_format(($wish->saved_amount / $wish->estimated_cost) * 100, 1) }}%</span>
                            <span class="text-gray-400">Épargne auto : {{ $wish->auto_save_percentage }}%</span>
                        </div>
                    </div>

                    @if($wish->status === 'pending')
                        <div class="flex flex-col space-y-3">
                            <form action="{{ route('wishes.update', $wish) }}" method="POST" class="flex space-x-2">
                                @csrf
                                @method('PUT')
                                <input type="number" name="saved_amount" 
                                       min="0" max="{{ $wish->estimated_cost }}" step="0.01"
                                       value="{{ $wish->saved_amount }}"
                                       class="flex-1 px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm">
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
                                    Mettre à jour
                                </button>
                            </form>

                            <div class="flex space-x-2">
                                <form action="{{ route('wishes.update', $wish) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="achieved">
                                    <button type="submit" 
                                            class="w-full px-4 py-2 bg-green-600/20 text-green-400 rounded-lg hover:bg-green-600/30">
                                        Réalisé
                                    </button>
                                </form>
                                
                                <form action="{{ route('wishes.update', $wish) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" 
                                            class="w-full px-4 py-2 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600/30">
                                        Annuler
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                    <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700/50">
                        <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                        <p class="text-gray-400 text-lg mb-4">Vous n'avez pas encore de souhaits</p>
                        <button @click="showWishModal = true" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                            Ajouter mon premier souhait
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Modal d'ajout de souhait -->
    <div x-show="showWishModal" 
         class="fixed inset-0 bg-gray-900/80 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-gray-800 rounded-2xl p-6 w-full max-w-md border border-gray-700/50"
             @click.away="showWishModal = false">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-white">Nouveau souhait</h3>
                <button @click="showWishModal = false" class="text-gray-400 hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form action="{{ route('wishes.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Titre</label>
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
                        <label class="block text-sm font-medium text-gray-300 mb-2">Coût estimé (DH)</label>
                        <input type="number" name="estimated_cost" step="0.01"
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Priorité</label>
                        <select name="priority" 
                                class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white">
                            <option value="low">Faible</option>
                            <option value="medium" selected>Moyenne</option>
                            <option value="high">Élevée</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Montant épargné</label>
                        <input type="number" name="saved_amount" min="0" step="0.01"
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                               value="0" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Épargne auto (%)</label>
                        <input type="number" name="auto_save_percentage" min="0" max="100" step="0.01"
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                               value="0" required>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" @click="showWishModal = false"
                            class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                        Ajouter le souhait
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
