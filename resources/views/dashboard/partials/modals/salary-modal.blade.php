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
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Montant mensuel (DH)
                    </label>
                    <input type="number" 
                           name="amount" 
                           value="{{ auth()->user()->salary ?? 0 }}"
                           min="0"
                           step="0.01"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Jour de versement du salaire
                    </label>
                    <input type="number" 
                           name="salary_day" 
                           value="{{ auth()->user()->salary_day ?? 1 }}"
                           min="1" 
                           max="31"
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white focus:ring-2 focus:ring-blue-500">
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
