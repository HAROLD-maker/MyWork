@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center w-full min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100">
    <!-- Hero Section -->
    <section class="w-full flex flex-col items-center text-center gap-4 mt-12 mb-8">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 mb-2">Explora las categorías</h1>
        <p class="text-lg md:text-2xl text-gray-700 max-w-2xl mb-4">Encuentra el servicio ideal para ti entre nuestras categorías más populares.</p>
        <form class="flex items-center bg-white rounded-full shadow-md px-4 py-2 border-2 border-blue-200 max-w-md w-full mx-auto">
            <input type="text" placeholder="Buscar categoría..." class="flex-1 bg-transparent outline-none text-gray-700 placeholder-gray-400 py-2 px-2 text-lg" />
            <button type="submit" class="ml-2 text-blue-400 hover:text-blue-600 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z" /></svg>
            </button>
        </form>
    </section>
    <!-- Grid de categorías -->
    <section class="w-full max-w-6xl grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8 mb-16">
        <div class="bg-gradient-to-br from-blue-400 to-violet-400 rounded-xl flex flex-col justify-end overflow-hidden relative h-40 shadow-lg hover:scale-105 transition">
            <img src="/images/categoria1.jpg" alt="Belleza y Estética" class="absolute inset-0 w-full h-full object-cover opacity-60" />
            <span class="relative z-10 text-white text-xl font-bold p-6">Belleza y<br>Estética</span>
        </div>
        <div class="bg-gradient-to-br from-blue-400 to-violet-400 rounded-xl flex flex-col justify-end overflow-hidden relative h-40 shadow-lg hover:scale-105 transition">
            <img src="/images/categoria2.jpg" alt="Reparaciones y Mantenimiento" class="absolute inset-0 w-full h-full object-cover opacity-60" />
            <span class="relative z-10 text-white text-xl font-bold p-6">Reparaciones y<br>Mantenimiento</span>
        </div>
        <div class="bg-gradient-to-br from-blue-400 to-violet-400 rounded-xl flex flex-col justify-end overflow-hidden relative h-40 shadow-lg hover:scale-105 transition">
            <img src="/images/categoria3.jpg" alt="Hogar y Construcción" class="absolute inset-0 w-full h-full object-cover opacity-60" />
            <span class="relative z-10 text-white text-xl font-bold p-6">Hogar y<br>Construcción</span>
        </div>
        <div class="bg-gradient-to-br from-blue-400 to-violet-400 rounded-xl flex flex-col justify-end overflow-hidden relative h-40 shadow-lg hover:scale-105 transition">
            <img src="/images/categoria4.jpg" alt="Educación y Clases" class="absolute inset-0 w-full h-full object-cover opacity-60" />
            <span class="relative z-10 text-white text-xl font-bold p-6">Educación y<br>Clases</span>
        </div>
        <!-- Puedes agregar más categorías aquí -->
    </section>
</div>
@endsection 