<div class="w-full">
    <h3 class="text-2xl font-extrabold text-blue-700 mb-8 text-center tracking-tight">Filtros</h3>
    <form class="flex flex-col gap-7">
        <div>
            <label class="block text-blue-700 text-base font-semibold mb-2">Categoría</label>
            <div class="relative">
                <select class="w-full border border-blue-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80 appearance-none">
                    <option>Todas</option>
                </select>
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </span>
            </div>
        </div>
        <div>
            <label class="block text-blue-700 text-base font-semibold mb-2">Ubicación</label>
            <div class="relative">
                <select class="w-full border border-blue-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80 appearance-none">
                    <option>Todas</option>
                </select>
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </span>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" id="servicio_domicilio" />
            <label class="text-blue-700 text-base font-semibold" for="servicio_domicilio">Servicio a domicilio</label>
        </div>
        <div>
            <label class="block text-blue-700 text-base font-semibold mb-2">Calificaciones</label>
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" />
                    <span class="text-yellow-400 text-lg">★★★★★</span>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" />
                    <span class="text-yellow-400 text-lg">★★★★☆</span>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" />
                    <span class="text-yellow-400 text-lg">★★★☆☆</span>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" />
                    <span class="text-yellow-400 text-lg">★★☆☆☆</span>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" />
                    <span class="text-yellow-400 text-lg">★☆☆☆☆</span>
                </div>
            </div>
        </div>
        <div>
            <label class="block text-blue-700 text-base font-semibold mb-2">Tipo</label>
            <div class="flex gap-5">
                <label class="flex items-center gap-2 text-blue-700 font-semibold">
                    <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" />
                    <span>Independiente</span>
                </label>
                <label class="flex items-center gap-2 text-blue-700 font-semibold">
                    <input type="checkbox" class="accent-violet-500 border-blue-300 rounded" />
                    <span>Empresa</span>
                </label>
            </div>
        </div>
        <div>
            <label class="block text-blue-700 text-base font-semibold mb-2">Edad</label>
            <div class="flex gap-3 items-center">
                <input type="number" min="18" placeholder="Mínima" class="w-24 border border-blue-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80" />
                <span class="text-gray-400">-</span>
                <input type="number" min="18" placeholder="Máxima" class="w-24 border border-blue-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80" />
            </div>
        </div>
        <button type="reset" class="mt-2 w-full py-2 rounded-lg bg-gradient-to-r from-blue-500 to-violet-500 text-white font-bold shadow hover:from-violet-600 hover:to-blue-600 transition">Limpiar filtros</button>
    </form>
</div>
