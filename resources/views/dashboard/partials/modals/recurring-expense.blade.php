<div x-show="showRecurringModal" 
     class="fixed inset-0 bg-gray-900/80 z-50 flex items-center justify-center"
     x-cloak>
    <div class="bg-gray-800 rounded-2xl p-6 w-full max-w-md border border-gray-700/50">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-white">Nouvelle dépense récurrente</h3>
            <button @click="showRecurringModal = false" class="text-gray-400 hover:text-gray-300">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form action="{{ route('recurring-expenses.store') }}" method="POST">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nom</label>
                    <input type="text" 
                           name="name" 
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                           placeholder="ex: Loyer">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Montant</label>
                    <input type="number" 
                           name="amount" 
                           step="0.01"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white"
                           placeholder="0.00">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Catégorie</label>
                    <select name="category_id" 
                            class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Fréquence</label>
                    <select name="frequency" 
                            x-model="frequency"
                            class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white">
                        <option value="monthly">Mensuelle</option>
                        <option value="weekly">Hebdomadaire</option>
                        <option value="yearly">Annuelle</option>
                    </select>
                </div>

                <div x-show="frequency === 'monthly'">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Jour du mois</label>
                    <input type="number" 
                           name="day_of_month" 
                           min="1" 
                           max="31"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white">
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" 
                        @click="showRecurringModal = false"
                        class="px-4 py-2 text-gray-400 hover:text-white transition-colors">
                    Annuler
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>
