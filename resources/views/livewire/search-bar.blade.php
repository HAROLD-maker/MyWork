<div class="w-full flex justify-center my-6 px-2 sm:px-4">
    <form wire:submit.prevent :class="{ 'bg-gray-800 border-gray-600': $parent.dark, 'bg-white border-blue-200': !$parent.dark }" class="w-full max-w-full md:max-w-2xl flex items-center rounded-xl shadow-md px-4 md:px-6 py-4 border">
        <!-- Input de búsqueda simple -->
        <div class="relative flex-1 w-full">
            <input type="text" wire:model="query" placeholder="Buscar..." :class="{ 'border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:ring-blue-500': $parent.dark, 'border-blue-300 bg-white text-gray-900 placeholder-gray-500 focus:ring-blue-400': !$parent.dark }" class="w-full rounded-lg py-2 pl-4 pr-10 focus:outline-none focus:ring-2 transition" />
            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z" /></svg>
            </span>
        </div>
    </form>
</div>
