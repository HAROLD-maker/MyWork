<div class="w-full">
    <h3 class="text-2xl font-extrabold text-blue-700 mb-8">Resultados</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @foreach($users as $user)
            <div class="bg-white/90 rounded-2xl shadow-2xl p-7 flex flex-col items-center border-l-8 border-blue-400/60 hover:scale-105 hover:shadow-3xl transition-transform duration-300">
                <div class="w-24 h-24 bg-gradient-to-br from-blue-200 to-violet-200 rounded-full flex items-center justify-center mb-5 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
                <strong class="text-blue-700 text-xl font-bold mb-1">{{ $user->name }}</strong>
                <span class="text-gray-500 text-base mb-2">{{ $user->email }}</span>
                <div class="flex gap-2 mt-3">
                    <button class="px-4 py-2 rounded-full bg-gradient-to-r from-blue-500 to-violet-500 text-white text-base font-semibold shadow hover:from-violet-600 hover:to-blue-600 transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m6 4H9m6-8H9" /></svg>
                        Ver perfil
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
