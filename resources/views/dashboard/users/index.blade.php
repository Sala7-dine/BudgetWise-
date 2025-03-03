<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white">Gestion des utilisateurs</h1>
                <p class="text-gray-400 mt-2">Gérez les utilisateurs et leurs rôles</p>
            </div>

            <!-- Tableau des utilisateurs -->
            <div class="bg-gray-800 rounded-3xl border border-gray-700/50 shadow-xl overflow-hidden">
                <!-- Barre de recherche et filtres -->
                <div class="p-6 border-b border-gray-700/50">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="relative flex-1 max-w-md">
                            <input type="text" 
                                   id="searchInput"
                                   placeholder="Rechercher un utilisateur..." 
                                   class="w-full px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 text-gray-400 absolute right-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div class="flex items-center space-x-4">
                            <select class="px-4 py-2.5 bg-gray-700/50 border border-gray-600 rounded-xl text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Tous les rôles</option>
                                <option value="admin">Administrateur</option>
                                <option value="user">Utilisateur</option>
                            </select>
                            <button class="px-4 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors duration-200">
                                Exporter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-400 text-sm border-b border-gray-700/50">
                                <th class="px-6 py-4 font-medium">Utilisateur</th>
                                <th class="px-6 py-4 font-medium">Email</th>
                                <th class="px-6 py-4 font-medium">Rôle</th>
                                <th class="px-6 py-4 font-medium">Date d'inscription</th>
                                <th class="px-6 py-4 font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700/50">
                            @foreach($users as $user)
                            <tr class="text-gray-300 hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-xl bg-blue-600/20 flex items-center justify-center text-blue-500 font-bold">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <div class="ml-3">
                                            <p class="font-medium text-white">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.users.update-role', $user) }}" 
                                          method="POST" 
                                          class="inline-flex"
                                          x-data="{ submitting: false }"
                                          @submit="submitting = true">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" 
                                                onchange="this.form.submit()"
                                                class="px-3 py-1 bg-gray-700/50 border border-gray-600 rounded-lg text-sm text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                :disabled="submitting">
                                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                                                Utilisateur
                                            </option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                                Administrateur
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <button onclick="window.location.href='{{ route('admin.users.show', $user) }}'"
                                                class="p-2 text-gray-400 hover:text-white transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.users.destroy', $user) }}" 
                                              method="POST"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>