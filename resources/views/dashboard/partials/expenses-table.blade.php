<div class="overflow-x-auto">
    <table class="min-w-full">
        <thead>
            <tr class="border-b border-gray-700">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-400">Date</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-400">Description</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-400">Catégorie</th>
                <th class="px-4 py-3 text-right text-sm font-medium text-gray-400">Montant</th>
                <th class="px-4 py-3 text-right text-sm font-medium text-gray-400">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($expenses as $expense)
                <tr class="border-b border-gray-700 hover:bg-gray-700/30">
                    <td class="px-4 py-4 text-gray-300">{{ $expense->date->format('d/m/Y') }}</td>
                    <td class="px-4 py-4 text-white">{{ $expense->description }}</td>
                    <td class="px-4 py-4">
                        <span class="px-2 py-1 bg-blue-900/20 text-blue-400 rounded-md text-xs">
                            {{ $expense->category->name }}
                        </span>
                    </td>
                    <td class="px-4 py-4 text-right text-white font-medium">
                        {{ number_format($expense->amount, 2) }} DH
                    </td>
                    <td class="px-4 py-4 text-right">
                        <form action="{{ route('expenses.destroy', $expense) }}" 
                              method="POST" 
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                        Aucune dépense enregistrée.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $expenses->links() }}
    </div>
</div>
