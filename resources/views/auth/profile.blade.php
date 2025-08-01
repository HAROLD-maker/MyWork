@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header de la página -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-blue-700 mb-2">Editar Perfil</h1>
            <p class="text-gray-600 text-lg">Actualiza tu información personal</p>
        </div>

        @if(session('status'))
            <div class="mb-6 p-4 bg-green-100 border border-green-200 rounded-xl text-green-700 font-semibold">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-semibold text-red-700">Error al actualizar perfil</span>
                </div>
                <ul class="text-red-600 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Información del perfil -->
            <div class="lg:col-span-2">
                <div class="bg-white/90 rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-blue-700 mb-6 flex items-center gap-3">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Información Personal
                    </h2>

                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-blue-700 font-semibold mb-2">Nombre completo</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                                       class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                            </div>

                            <div>
                                <label for="email" class="block text-blue-700 font-semibold mb-2">Correo electrónico</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                                       class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                            </div>

                            <div>
                                <label for="category" class="block text-blue-700 font-semibold mb-2">Categoría profesional</label>
                                <select id="category" name="category" 
                                        class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                                    <option value="">Selecciona una categoría</option>
                                    <option value="Desarrollo Web" {{ old('category', $user->category) == 'Desarrollo Web' ? 'selected' : '' }}>Desarrollo Web</option>
                                    <option value="Diseño Gráfico" {{ old('category', $user->category) == 'Diseño Gráfico' ? 'selected' : '' }}>Diseño Gráfico</option>
                                    <option value="Marketing Digital" {{ old('category', $user->category) == 'Marketing Digital' ? 'selected' : '' }}>Marketing Digital</option>
                                    <option value="Administración" {{ old('category', $user->category) == 'Administración' ? 'selected' : '' }}>Administración</option>
                                    <option value="Ventas" {{ old('category', $user->category) == 'Ventas' ? 'selected' : '' }}>Ventas</option>
                                    <option value="Atención al Cliente" {{ old('category', $user->category) == 'Atención al Cliente' ? 'selected' : '' }}>Atención al Cliente</option>
                                    <option value="Logística" {{ old('category', $user->category) == 'Logística' ? 'selected' : '' }}>Logística</option>
                                    <option value="Recursos Humanos" {{ old('category', $user->category) == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
                                    <option value="Contabilidad" {{ old('category', $user->category) == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                                    <option value="Otros" {{ old('category', $user->category) == 'Otros' ? 'selected' : '' }}>Otros</option>
                                </select>
                            </div>

                            <div>
                                <label for="location" class="block text-blue-700 font-semibold mb-2">Ubicación</label>
                                <input type="text" id="location" name="location" value="{{ old('location', $user->location) }}"
                                       placeholder="Ciudad, País"
                                       class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                            </div>
                        </div>

                        <div class="flex gap-4 pt-6">
                            <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-blue-500 to-violet-500 text-white rounded-xl font-bold shadow-lg hover:from-violet-600 hover:to-blue-600 text-lg transition transform hover:scale-105">
                                <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                Guardar Cambios
                            </button>
                            <a href="{{ route('dashboard') }}" class="px-8 py-4 bg-gray-100 text-gray-700 rounded-xl font-semibold shadow hover:bg-gray-200 text-lg transition">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Panel lateral -->
            <div class="space-y-6">
                <!-- Tarjeta de información actual -->
                <div class="bg-white/90 rounded-2xl shadow-xl p-6">
                    <h3 class="text-xl font-bold text-blue-700 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Tu Perfil Actual
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-400 to-violet-400 flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-bold text-gray-800 text-lg">{{ $user->name }}</div>
                                <div class="text-gray-500 text-sm">{{ $user->email }}</div>
                            </div>
                        </div>
                        @if($user->category)
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">Categoría:</span>
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">{{ $user->category }}</span>
                            </div>
                        @endif
                        @if($user->location)
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">Ubicación:</span>
                                <span class="px-3 py-1 bg-violet-100 text-violet-700 rounded-full text-sm font-semibold">{{ $user->location }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Acciones rápidas -->
                <div class="bg-white/90 rounded-2xl shadow-xl p-6">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">Acciones Rápidas</h3>
                    <div class="space-y-3">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                            </svg>
                            <span class="font-medium">Volver al Perfil</span>
                        </a>
                        <a href="{{ route('password.request') }}" class="flex items-center gap-3 p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                            <span class="font-medium">Cambiar Contraseña</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 