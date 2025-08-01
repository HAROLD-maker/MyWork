<header class="sticky top-0 z-30 w-full bg-white/95 shadow-lg backdrop-blur-md border-b border-blue-100">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-5">
        <!-- Logo y marca -->
        <a href="/" class="flex items-center gap-3 group">
            <div class="relative">
                <img src="/images/mywork-logo.png" alt="MYWORK" class="h-12 transition-transform group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-violet-400 opacity-0 group-hover:opacity-20 rounded-full transition-opacity"></div>
            </div>
            <div class="flex flex-col">
                <span class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-violet-600 bg-clip-text text-transparent">MyWork</span>
                <span class="text-xs text-gray-500 font-medium">Encuentra tu próximo trabajo</span>
            </div>
        </a>

        <!-- Navegación principal -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="/" class="relative text-gray-700 font-semibold hover:text-blue-600 transition-colors duration-200 group">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Buscar
                </span>
                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 group-hover:w-full transition-all duration-300"></div>
            </a>
            <a href="/categorias" class="relative text-gray-700 font-semibold hover:text-blue-600 transition-colors duration-200 group">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                    Categorías
                </span>
                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 group-hover:w-full transition-all duration-300"></div>
            </a>
            <a href="/nosotros" class="relative text-gray-700 font-semibold hover:text-blue-600 transition-colors duration-200 group">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2a4 4 0 10-8 0 4 4 0 008 0zm6-2a4 4 0 10-8 0 4 4 0 008 0z"/>
                    </svg>
                    Nosotros
                </span>
                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 group-hover:w-full transition-all duration-300"></div>
            </a>
        </nav>

        <!-- Acciones de usuario -->
        <div class="flex items-center gap-4">
            @guest
                <!-- Botón de acceso para usuarios no autenticados -->
                <div class="relative group">
                    <button class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-violet-500 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-violet-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Acceso</span>
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-2xl py-3 opacity-0 group-hover:opacity-100 group-hover:pointer-events-auto pointer-events-none transition-all duration-300 z-20 border border-gray-100">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <div class="text-sm text-gray-500">¿Ya tienes cuenta?</div>
                        </div>
                        <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 transition-colors">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            <span class="font-medium">Iniciar sesión</span>
                        </a>
                        <div class="px-4 py-2 border-t border-gray-100">
                            <div class="text-sm text-gray-500">¿Eres nuevo?</div>
                        </div>
                        <a href="{{ route('register') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-green-50 transition-colors">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            <span class="font-medium">Registrarse</span>
                        </a>
                    </div>
                </div>
            @else
                <!-- Panel de usuario autenticado -->
                <div class="flex items-center gap-4">
                    <!-- Avatar y información del usuario -->
                    <div class="flex items-center gap-3">
                        <a href="{{ route('profile.edit') }}" class="relative group">
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-400 to-violet-400 flex items-center justify-center text-white text-2xl font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 cursor-pointer">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 border-2 border-white rounded-full"></div>
                        </a>
                        <div class="hidden lg:block">
                            <a href="{{ route('profile.edit') }}" class="hover:text-blue-600 transition-colors">
                                <div class="font-bold text-gray-800 text-lg">{{ Auth::user()->name }}</div>
                                <div class="text-gray-500 text-sm flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                    {{ Auth::user()->email }}
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Menú desplegable -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-violet-500 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-violet-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <span>Menú</span>
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl py-3 opacity-0 group-hover:opacity-100 group-hover:pointer-events-auto pointer-events-none transition-all duration-300 z-20 border border-gray-100">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="text-sm text-gray-500">Panel de usuario</div>
                            </div>
                            <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 transition-colors">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                </svg>
                                <span class="font-medium">Mi Dashboard</span>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 transition-colors">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span class="font-medium">Mi perfil</span>
                            </a>
                            <a href="{{ route('support.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 transition-colors">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <span class="font-medium">Soporte</span>
                            </a>
                            <div class="px-4 py-2 border-t border-gray-100">
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-red-600 hover:bg-red-50 transition-colors rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        <span class="font-medium">Cerrar sesión</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</header>