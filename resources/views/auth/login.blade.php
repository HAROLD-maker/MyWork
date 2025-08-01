@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100">
    <div class="w-full max-w-md bg-white/90 rounded-2xl shadow-2xl p-10 mt-16">
        <h2 class="text-3xl font-extrabold text-blue-700 mb-6 text-center">Iniciar sesión</h2>
        
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-semibold text-red-700">Error de autenticación</span>
                </div>
                <ul class="text-red-600 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
            @csrf
            <div>
                <label for="email" class="block text-blue-700 font-semibold mb-1">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                       class="w-full border @error('email') border-red-300 @else border-blue-300 @enderror rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80">
            </div>
            <div>
                <label for="password" class="block text-blue-700 font-semibold mb-1">Contraseña</label>
                <input id="password" type="password" name="password" required 
                       class="w-full border @error('password') border-red-300 @else border-blue-300 @enderror rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80">
            </div>
            <button type="submit" class="w-full py-3 rounded-lg bg-gradient-to-r from-blue-500 to-violet-500 text-white font-bold shadow hover:from-violet-600 hover:to-blue-600 transition">Entrar</button>
        </form>
        <div class="flex flex-col items-center gap-2 mt-6">
            <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-violet-600 text-sm">¿Olvidaste tu contraseña?</a>
            <span class="text-gray-400 text-sm">¿No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-500 hover:text-violet-600 font-semibold">Regístrate</a></span>
        </div>
    </div>
</div>
@endsection 