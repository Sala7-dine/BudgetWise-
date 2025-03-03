@props(['name', 'show' => false])

<div x-data="{ show: false }"
     x-show="show"
     @open-modal.window="$event.detail === '{{ $name }}' ? show = true : null"
     @close.window="show = false"
     @keydown.escape.window="show = false"
     style="display: none"
     class="fixed inset-0 z-50 overflow-y-auto">
    
    <!-- Overlay -->
    <div x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm"
         @click="show = false">
    </div>

    <!-- Modal -->
    <div x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative min-h-screen flex items-center justify-center p-4">
        
        <div class="relative max-w-xl w-full bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            {{ $slot }}
        </div>
    </div>
</div>
