@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center w-full min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100">
    <!-- Hero Section -->
    <section class="w-full flex flex-col items-center text-center gap-4 mt-12 mb-8">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 mb-2">Sobre MyWork</h1>
        <p class="text-lg md:text-2xl text-gray-700 max-w-2xl mb-4">Conectamos personas con servicios de calidad, de manera fácil, rápida y segura.</p>
    </section>
    <!-- Misión, Visión, Valores -->
    <section class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
            <h2 class="text-xl font-bold text-blue-700 mb-2">Misión</h2>
            <p class="text-gray-700">Facilitar el acceso a servicios confiables y profesionales para todos, mejorando la vida de las personas y el crecimiento de los negocios locales.</p>
        </div>
        <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
            <h2 class="text-xl font-bold text-blue-700 mb-2">Visión</h2>
            <p class="text-gray-700">Ser la plataforma líder en conexión de servicios en Latinoamérica, reconocida por su innovación, confianza y calidad.</p>
        </div>
        <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
            <h2 class="text-xl font-bold text-blue-700 mb-2">Valores</h2>
            <ul class="text-gray-700 list-disc list-inside">
                <li>Confianza</li>
                <li>Innovación</li>
                <li>Calidad</li>
                <li>Empatía</li>
                <li>Compromiso</li>
            </ul>
        </div>
    </section>
    <!-- Equipo -->
    <section class="w-full max-w-4xl flex flex-col items-center gap-8 mb-16">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Nuestro equipo</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 w-full">
            <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
                <img src="/images/imagenperfil.jpg" alt="Equipo" class="w-20 h-20 rounded-full mb-2 object-cover border-4 border-blue-200">
                <span class="text-blue-700 font-semibold">Harold Montoya</span>
                <span class="text-gray-500 text-sm">CEO & Fundador</span>
            </div>

            <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
                <img src="/images/imagenperfil.jpg" alt="Equipo" class="w-20 h-20 rounded-full mb-2 object-cover border-4 border-blue-200">
                <span class="text-blue-700 font-semibold">Kevin Urriago</span>
                <span class="text-gray-500 text-sm">Diseño & Producto</span>
            </div>
        </div>
    </section>
    <!-- Llamado a la acción -->
    <section class="w-full flex flex-col items-center text-center gap-4 mb-16">
        <h2 class="text-2xl font-bold text-blue-700 mb-2">¿Quieres unirte a nuestro equipo?</h2>
        <p class="text-gray-700 mb-4">Estamos en constante crecimiento y buscamos personas apasionadas por la tecnología y el servicio.</p>
        <a href="mailto:contacto@mywork.com" class="inline-block px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 to-violet-500 text-white font-bold text-lg shadow hover:from-violet-600 hover:to-blue-600 transition">Contáctanos</a>
    </section>
</div>
@endsection 