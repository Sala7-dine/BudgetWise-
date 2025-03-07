<header class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <div class="text-2xl font-bold text-white">BudgetWise</div>
                <nav class="ml-10 space-x-4">
                    <a href="{{ route('user.dashboard') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('user.dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Dashboard
                    </a>
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Administration
                    </a>
                    @endif
                </nav>
            </div>
            
            <div class="flex items-center">
                <div class="flex items-center space-x-2 mr-4">
                    <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                    {{-- <span class="text-gray-300 text-sm">{{ auth()->user()->name }}</span> --}}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white text-sm font-medium">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
