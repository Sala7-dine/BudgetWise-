<div x-data="{ showRecurringExpenseModal: false }">
    <div id="tab-recurring" class="tab-content hidden">
        <!-- En-tête avec bouton d'ajout -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Dépenses récurrentes</h2>
        </div>

        <!-- Grille des dépenses récurrentes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($recurringExpenses as $expense)
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700/50 shadow-lg hover:border-purple-500/50 transition-colors">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">{{ $expense->description }}</h3>
                        <div class="flex space-x-2 mb-2">
                            <span class="px-2 py-1 bg-purple-900/20 text-purple-400 rounded text-xs">
                                {{ ucfirst($expense->frequency) }}
                            </span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 rounded text-xs">
                                {{ $expense->category->name }}
                            </span>
                        </div>
                    </div>
                    <form action="{{ route('recurring-expenses.destroy', $expense) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="flex items-center justify-between text-2xl font-bold text-white mb-4">
                    <span>{{ number_format($expense->amount, 0) }} DH</span>
                    <span class="text-sm font-normal text-gray-400">
                        @if($expense->frequency === 'monthly')
                            /mois
                        @elseif($expense->frequency === 'weekly')
                            /semaine
                        @else
                            /{{ $expense->frequency }}
                        @endif
                    </span>
                </div>

                <div class="flex items-center justify-between text-sm text-gray-400">
                    <span>Prochaine échéance :</span>
                    <span>{{ $expense->next_date?->format('d/m/Y') ?? 'Non définie' }}</span>
                </div>
            </div>
            @empty
            <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700/50">
                    <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    <p class="text-gray-400 text-lg mb-4">Vous n'avez pas encore de dépenses récurrentes</p>
                
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
