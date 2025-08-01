@extends('layouts.app')

@section('content')
<style>
    .glass {
        background: rgba(255,255,255,0.85);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
        backdrop-filter: blur(8px);
        border-radius: 1.5rem;
    }
    .avatar {
        background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%);
        color: #fff;
        font-size: 2.5rem;
        width: 90px;
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        box-shadow: 0 8px 25px 0 rgba(96,165,250,0.25);
        font-weight: 700;
    }
    .fade-in {
        animation: fadeIn 1s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
<div class="min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100 flex flex-col">
    <main class="flex-1 flex flex-col items-center justify-center px-4 py-8">
        <!-- Fondo decorativo animado -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <svg class="absolute top-0 left-0 w-96 h-96 opacity-20" viewBox="0 0 400 400"><circle cx="200" cy="200" r="200" fill="#a5b4fc"/></svg>
            <svg class="absolute bottom-0 right-0 w-96 h-96 opacity-10" viewBox="0 0 400 400"><circle cx="200" cy="200" r="200" fill="#38bdf8"/></svg>
        </div>
        <!-- Tarjeta de bienvenida -->
        <div class="relative z-10 w-full max-w-2xl glass p-10 flex flex-col items-center mb-8 fade-in">
            <h2 class="text-4xl font-extrabold text-blue-700 mb-2 text-center">¡Hola, {{ $user->name }}!</h2>
            <p class="text-gray-600 mb-6 text-center text-lg">Nos alegra tenerte de vuelta en <span class="font-bold text-blue-600">MyWork</span>. ¿Qué quieres hacer hoy?</p>
            <div class="flex flex-col md:flex-row gap-8 w-full justify-center mt-2">
                <!-- Accesos rápidos -->
                <a href="{{ url('/') }}" class="flex-1 flex flex-col items-center bg-gradient-to-br from-blue-200 to-blue-400 rounded-xl p-8 shadow-lg hover:scale-105 transition">
                    <svg class="w-12 h-12 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="font-semibold text-blue-700 text-lg">Buscar</span>
                </a>
                <a href="{{ url('/categorias') }}" class="flex-1 flex flex-col items-center bg-gradient-to-br from-violet-200 to-blue-200 rounded-xl p-8 shadow-lg hover:scale-105 transition">
                    <svg class="w-12 h-12 text-violet-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    <span class="font-semibold text-violet-700 text-lg">Categorías</span>
                </a>
                <a href="{{ url('/nosotros') }}" class="flex-1 flex flex-col items-center bg-gradient-to-br from-blue-100 to-violet-200 rounded-xl p-8 shadow-lg hover:scale-105 transition">
                    <svg class="w-12 h-12 text-cyan-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2a4 4 0 10-8 0 4 4 0 008 0zm6-2a4 4 0 10-8 0 4 4 0 008 0z"/></svg>
                    <span class="font-semibold text-cyan-700 text-lg">Nosotros</span>
                </a>
            </div>
        </div>

        <!-- Sección de perfil tipo tarjeta -->
        <div id="perfil" class="relative z-10 w-full max-w-xl glass p-8 flex flex-col gap-4 fade-in mt-4">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="avatar mb-2 md:mb-0">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-blue-700 mb-1">Mi perfil</h3>
                    <div class="mb-1"><span class="font-semibold text-gray-700">Nombre:</span> {{ $user->name }}</div>
                    <div class="mb-1"><span class="font-semibold text-gray-700">Correo:</span> {{ $user->email }}</div>
                    @if($user->category)
                        <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold mr-2">{{ $user->category }}</span>
                    @endif
                    @if($user->location)
                        <span class="inline-block bg-violet-100 text-violet-700 px-3 py-1 rounded-full text-xs font-semibold">{{ $user->location }}</span>
                    @endif
                </div>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-semibold shadow hover:bg-blue-200 transition">Editar perfil</a>
                    <a href="{{ route('support.index') }}" class="px-4 py-2 bg-violet-100 text-violet-700 rounded-lg font-semibold shadow hover:bg-violet-200 transition">Soporte</a>
                </div>
            </div>
            <!-- Sección de hojas de vida -->
            <div class="mt-8">
                <div class="glass p-8 rounded-2xl shadow-xl">
                    <h4 class="text-2xl font-extrabold text-blue-700 mb-6 flex items-center gap-2">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Hojas de vida
                    </h4>
                    @if(session('status'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow text-base font-semibold animate-fade-in">{{ session('status') }}</div>
                    @endif
                    <!-- Formulario de carga -->
                    <form method="POST" action="{{ route('resumes.store') }}" enctype="multipart/form-data" class="flex flex-col gap-6 mb-8 bg-gradient-to-r from-blue-50 to-violet-50 p-6 rounded-2xl shadow-inner">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label class="block text-base font-semibold text-blue-700">Título de la hoja de vida</label>
                                <input type="text" name="title" required class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition" placeholder="Ej: CV Ingeniero, CV Desarrollador...">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="block text-base font-semibold text-blue-700">Versión</label>
                                <input type="text" name="version" class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition" placeholder="Ej: v1.0, 2024, etc...">
                            </div>
                            <div class="flex flex-col gap-2 md:col-span-2">
                                <label class="block text-base font-semibold text-blue-700">Descripción</label>
                                <textarea name="description" rows="2" class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition" placeholder="Opcional: Detalles, experiencia destacada..."></textarea>
                            </div>
                            <div class="flex flex-col gap-2 md:col-span-2">
                                <label class="block text-base font-semibold text-blue-700">Archivo (PDF, DOC, DOCX)</label>
                                <input type="file" name="file" accept=".pdf,.doc,.docx" required class="block w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-base transition bg-blue-50 file:bg-blue-100 file:text-blue-700 file:rounded-xl file:border-0 file:py-3 file:px-4 file:mr-4 hover:file:bg-blue-200" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="block text-base font-semibold text-blue-700">Fecha de actualización</label>
                                <input type="date" name="issued_at" class="px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400 text-lg transition">
                            </div>
                        </div>
                        <button type="submit" class="flex items-center gap-2 justify-center w-full px-8 py-3 bg-gradient-to-r from-blue-500 to-violet-500 text-white rounded-xl font-bold shadow hover:from-violet-600 hover:to-blue-600 text-lg transition mt-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/></svg>
                            Subir hoja de vida
                        </button>
                    </form>
                    <!-- Listado de hojas de vida -->
                    <div class="mt-4">
                        @if(isset($resumes) && $resumes->count())
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($resumes as $resume)
                                    <div class="flex items-center justify-between bg-white/90 rounded-2xl shadow-lg p-6 animate-fade-in">
                                        <div class="flex items-center gap-6">
                                            <div class="flex-shrink-0">
                                                @if(Str::endsWith($resume->file_path, ['pdf','PDF']))
                                                    <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                @elseif(Str::endsWith($resume->file_path, ['doc','docx','DOC','DOCX']))
                                                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                @else
                                                    <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><path d="M8 11h.01M12 11h.01M16 11h.01"/></svg>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-bold text-blue-700 text-xl">{{ $resume->title }}</div>
                                                @if($resume->version)
                                                    <div class="text-sm text-violet-700 font-semibold mb-1">Versión: {{ $resume->version }}</div>
                                                @endif
                                                @if($resume->description)
                                                    <div class="text-sm text-gray-600 mb-1">{{ $resume->description }}</div>
                                                @endif
                                                <div class="text-sm text-gray-500 flex items-center gap-1">
                                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                    {{ $resume->issued_at ? 'Actualizada: '.\Carbon\Carbon::parse($resume->issued_at)->format('d/m/Y') : 'Sin fecha' }}
                                                </div>
                                                <a href="{{ asset('storage/'.$resume->file_path) }}" target="_blank" class="inline-block mt-2 text-blue-500 hover:underline text-base font-semibold">Ver/Descargar</a>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ route('resumes.destroy', $resume) }}" onsubmit="return confirm('¿Eliminar esta hoja de vida?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-6 px-4 py-2 bg-red-100 text-red-600 rounded-xl hover:bg-red-200 text-base flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-gray-400 text-base mt-4">No has subido hojas de vida aún.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer elegante -->
    <footer class="w-full text-center text-gray-400 py-4 text-xs mt-8">
        &copy; {{ date('Y') }} MyWork. Todos los derechos reservados.
    </footer>
</div>
@endsection 