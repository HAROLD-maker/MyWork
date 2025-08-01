@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100">
    <div class="w-full max-w-md bg-white/90 rounded-2xl shadow-2xl p-10 mt-16">
        <h2 class="text-3xl font-extrabold text-blue-700 mb-6 text-center">Crear cuenta</h2>
        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-6">
            @csrf
            <div>
                <label for="name" class="block text-blue-700 font-semibold mb-1">Nombre</label>
                <input id="name" type="text" name="name" required autofocus class="w-full border border-blue-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80">
            </div>
            <div>
                <label for="email" class="block text-blue-700 font-semibold mb-1">Correo electrónico</label>
                <input id="email" type="email" name="email" required class="w-full border border-blue-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80">
            </div>
            <div>
                <label for="password" class="block text-blue-700 font-semibold mb-1">Contraseña</label>
                <input id="password" type="password" name="password" required class="w-full border border-blue-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80">
            </div>
            <div>
                <label for="password_confirmation" class="block text-blue-700 font-semibold mb-1">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full border border-blue-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-violet-400 focus:border-violet-400 bg-white/80">
            </div>
            <button type="submit" class="w-full py-3 rounded-lg bg-gradient-to-r from-blue-500 to-violet-500 text-white font-bold shadow hover:from-violet-600 hover:to-blue-600 transition">Registrarse</button>
        </form>
        <div class="flex flex-col items-center gap-2 mt-6">
            <span class="text-gray-400 text-sm">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-500 hover:text-violet-600 font-semibold">Inicia sesión</a></span>
        </div>
    </div>
</div>
@endsection 