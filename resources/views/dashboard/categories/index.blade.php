<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Messages de notification -->
            @if (session('success'))
                <div class="mb-8 bg-green-500/10 border border-green-500/20 rounded-md p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-400">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- En-tête -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Gestion des catégories</h1>
                    <p class="text-gray-400 mt-2">Gérez les catégories de dépenses</p>
                </div>
                <button @click="$dispatch('open-modal', 'add-category')" 
                        class="px-4 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Nouvelle catégorie
                </button>
            </div>

            <!-- Liste des catégories -->
            <div class="bg-gray-800 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                <div class="p-6 border-b border-gray-700/50">
                    <div class="relative max-w-md">
                        <input type="text" 
                               placeholder="Rechercher une catégorie..." 
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 text-gray-400 absolute right-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-400 text-sm border-b border-gray-700/50">
                                <th class="px-6 py-4 font-medium">Nom</th>
                                <th class="px-6 py-4 font-medium">Description</th>
                                <th class="px-6 py-4 font-medium">Couleur</th>
                                <th class="px-6 py-4 font-medium">Statut</th>
                                <th class="px-6 py-4 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700/50">
                            @foreach($categories as $category)
                            <tr class="text-gray-300 hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg flex items-center justify-center" 
                                             style="background-color: {{ $category->color }}20">
                                            <i class="fas {{ $category->icon }} text-lg" 
                                               style="color: {{ $category->color }}"></i>
                                        </div>
                                        <span class="ml-3 font-medium text-white">{{ $category->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">{{ $category->description }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 rounded-lg mr-2" 
                                             style="background-color: {{ $category->color }}"></div>
                                        <span>{{ $category->color }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-sm {{ $category->is_active ? 'bg-green-500/10 text-green-400' : 'bg-gray-500/10 text-gray-400' }}">
                                        {{ $category->is_active ? 'Actif' : 'Inactif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <button @click="$dispatch('open-modal', 'edit-category-{{ $category->id }}')"
                                                class="p-2 text-gray-400 hover:text-white transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" 
                                              method="POST"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="p-2 text-red-400 hover:text-red-500 transition-colors duration-200">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-700/50">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nouvelle Catégorie -->
    <x-modal name="add-category" :show="false">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-white mb-4">Nouvelle catégorie</h2>
            
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Nom</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required
                           class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                    <textarea id="description" 
                              name="description" 
                              rows="3"
                              class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-400 mb-1">Couleur</label>
                        <input type="color" 
                               id="color" 
                               name="color" 
                               required
                               class="w-full h-10 px-2 bg-gray-700/50 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-400 mb-1">Icône</label>
                        <input type="text" 
                               id="icon" 
                               name="icon" 
                               placeholder="fa-icon-name"
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button"
                        @click="$dispatch('close')"
                        class="px-4 py-2.5 bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600 transition-colors duration-200">
                    Annuler
                </button>
                <button type="submit"
                        class="px-4 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                    Créer
                </button>
            </div>
        </form>
    </x-modal>

    <!-- Modals Modification Catégories -->
    @foreach($categories as $category)
        <x-modal name="edit-category-{{ $category->id }}" :show="false">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="p-6">
                @csrf
                @method('PATCH')
                <h2 class="text-lg font-medium text-white mb-4">Modifier la catégorie</h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="name_{{ $category->id }}" class="block text-sm font-medium text-gray-400 mb-1">Nom</label>
                        <input type="text" 
                               id="name_{{ $category->id }}" 
                               name="name" 
                               value="{{ $category->name }}"
                               required
                               class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="description_{{ $category->id }}" class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                        <textarea id="description_{{ $category->id }}" 
                                  name="description" 
                                  rows="3"
                                  class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $category->description }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="color_{{ $category->id }}" class="block text-sm font-medium text-gray-400 mb-1">Couleur</label>
                            <input type="color" 
                                   id="color_{{ $category->id }}" 
                                   name="color" 
                                   value="{{ $category->color }}"
                                   required
                                   class="w-full h-10 px-2 bg-gray-700/50 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="icon_{{ $category->id }}" class="block text-sm font-medium text-gray-400 mb-1">Icône</label>
                            <input type="text" 
                                   id="icon_{{ $category->id }}" 
                                   name="icon" 
                                   value="{{ $category->icon }}"
                                   placeholder="fa-icon-name"
                                   class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1"
                                   {{ $category->is_active ? 'checked' : '' }}
                                   class="rounded border-gray-600 text-blue-600 focus:ring-blue-500 bg-gray-700/50">
                            <span class="ml-2 text-sm text-gray-400">Catégorie active</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button"
                            @click="$dispatch('close')"
                            class="px-4 py-2.5 bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600 transition-colors duration-200">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-4 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </x-modal>
    @endforeach
</x-app-layout> 