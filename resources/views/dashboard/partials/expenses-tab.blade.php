<div x-data="{ showExpenseModal: false }">
    <div id="tab-depenses" class="tab-content hidden">
        <!-- En-tête avec bouton d'ajout -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Mes dépenses</h2>
            <button @click="showExpenseModal = true" 
                    class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl transition-all duration-200 shadow-lg hover:shadow-blue-500/20 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Nouvelle dépense
            </button>
        </div>

        @include('dashboard.partials.expenses-table')
    </div>

    <!-- Modal d'ajout de dépense -->
    <div x-show="showExpenseModal" 
         class="fixed inset-0 bg-gray-900/80 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-gray-800 rounded-2xl p-6 w-full max-w-md border border-gray-700/50"
             @click.away="showExpenseModal = false">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-white">Nouvelle dépense</h3>
                <button @click="showExpenseModal = false" class="text-gray-400 hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form action="{{ route('expenses.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <input type="text" name="description"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                           required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Montant (DH)</label>
                        <input type="number" name="amount" step="0.01"
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Catégorie</label>
                        <select name="category_id" 
                                class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                                required>
                            <option value="">Sélectionner</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="pt-4">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Date</label>
                    <input type="date" name="date"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                           value="{{ date('Y-m-d') }}"
                           required>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" @click="showExpenseModal = false"
                            class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl transition-all duration-200">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
