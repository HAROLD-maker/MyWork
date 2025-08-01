@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100 py-8">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header de la página -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-blue-700 mb-4">Soporte</h1>
            <p class="text-gray-600 text-xl">¿Necesitas ayuda? Estamos aquí para ti</p>
        </div>

        @if(session('status'))
            <div class="mb-8 p-6 bg-green-100 border border-green-200 rounded-2xl text-green-700 font-semibold text-center">
                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z"/>
                </svg>
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Formulario de contacto -->
            <div class="lg:col-span-2">
                <div class="bg-white/90 rounded-2xl shadow-xl p-8">
                    <h2 class="text-3xl font-bold text-blue-700 mb-6 flex items-center gap-3">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Contacta con Soporte
                    </h2>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-semibold text-red-700">Error en el formulario</span>
                            </div>
                            <ul class="text-red-600 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('support.store') }}" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-blue-700 font-semibold mb-2">Nombre completo</label>
                                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name ?? '') }}" required
                                       class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                            </div>

                            <div>
                                <label for="email" class="block text-blue-700 font-semibold mb-2">Correo electrónico</label>
                                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email ?? '') }}" required
                                       class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-blue-700 font-semibold mb-2">Asunto</label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                                <option value="">Selecciona un asunto</option>
                                <option value="Problema técnico" {{ old('subject') == 'Problema técnico' ? 'selected' : '' }}>Problema técnico</option>
                                <option value="Cuenta y acceso" {{ old('subject') == 'Cuenta y acceso' ? 'selected' : '' }}>Cuenta y acceso</option>
                                <option value="Hojas de vida" {{ old('subject') == 'Hojas de vida' ? 'selected' : '' }}>Hojas de vida</option>
                                <option value="Facturación" {{ old('subject') == 'Facturación' ? 'selected' : '' }}>Facturación</option>
                                <option value="Sugerencia" {{ old('subject') == 'Sugerencia' ? 'selected' : '' }}>Sugerencia</option>
                                <option value="Otro" {{ old('subject') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-blue-700 font-semibold mb-2">Mensaje</label>
                            <textarea id="message" name="message" rows="6" required
                                      placeholder="Describe tu problema o consulta en detalle..."
                                      class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition resize-none"></textarea>
                        </div>

                        <div class="flex gap-4 pt-6">
                            <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-blue-500 to-violet-500 text-white rounded-xl font-bold shadow-lg hover:from-violet-600 hover:to-blue-600 text-lg transition transform hover:scale-105">
                                <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Enviar Mensaje
                            </button>
                            <a href="{{ route('dashboard') }}" class="px-8 py-4 bg-gray-100 text-gray-700 rounded-xl font-semibold shadow hover:bg-gray-200 text-lg transition">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Panel lateral con ayuda -->
            <div class="space-y-6">
                <!-- Información de contacto -->
                <div class="bg-white/90 rounded-2xl shadow-xl p-6">
                    <h3 class="text-xl font-bold text-blue-700 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Contacto Directo
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-gray-800">Email</div>
                                <div class="text-sm text-gray-600">soporte@mywork.com</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-violet-50 rounded-lg">
                            <svg class="w-5 h-5 text-violet-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <div class="font-semibold text-gray-800">Horario</div>
                                <div class="text-sm text-gray-600">Lun-Vie: 8:00 - 18:00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preguntas frecuentes -->
                <div class="bg-white/90 rounded-2xl shadow-xl p-6">
                    <h3 class="text-xl font-bold text-blue-700 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Preguntas Frecuentes
                    </h3>
                    <div class="space-y-3">
                        <details class="group">
                            <summary class="flex items-center gap-2 cursor-pointer p-3 hover:bg-blue-50 rounded-lg transition">
                                <svg class="w-5 h-5 text-blue-500 group-open:rotate-90 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span class="font-medium text-gray-800">¿Cómo subo mi hoja de vida?</span>
                            </summary>
                            <div class="p-3 text-sm text-gray-600">
                                Ve a tu dashboard, encuentra la sección "Hojas de vida" y usa el formulario para subir tu CV en formato PDF, DOC o DOCX.
                            </div>
                        </details>
                        <details class="group">
                            <summary class="flex items-center gap-2 cursor-pointer p-3 hover:bg-blue-50 rounded-lg transition">
                                <svg class="w-5 h-5 text-blue-500 group-open:rotate-90 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span class="font-medium text-gray-800">¿Olvidé mi contraseña?</span>
                            </summary>
                            <div class="p-3 text-sm text-gray-600">
                                En la página de login, haz clic en "¿Olvidaste tu contraseña?" y sigue las instrucciones enviadas a tu email.
                            </div>
                        </details>
                        <details class="group">
                            <summary class="flex items-center gap-2 cursor-pointer p-3 hover:bg-blue-50 rounded-lg transition">
                                <svg class="w-5 h-5 text-blue-500 group-open:rotate-90 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span class="font-medium text-gray-800">¿Cómo edito mi perfil?</span>
                            </summary>
                            <div class="p-3 text-sm text-gray-600">
                                Ve a tu dashboard y haz clic en "Editar perfil" para actualizar tu información personal.
                            </div>
                        </details>
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
                            <span class="font-medium">Recuperar Contraseña</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 