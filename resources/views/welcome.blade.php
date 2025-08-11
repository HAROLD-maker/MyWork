<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWork - Encuentra servicios cerca de ti</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
            <style>
        body { font-family: 'Inter', 'Poppins', Arial, sans-serif; }
            </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    </head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-cyan-100 to-violet-100 text-gray-900">
    <livewire:header />
    <main class="pt-28 sm:pt-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-16">

        <!-- Hero Section -->
        <section class="w-full flex flex-col items-center text-center gap-6 mt-4">
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 mb-2">Encuentra servicios cerca de ti</h1>
            <p class="text-lg md:text-2xl text-gray-700 max-w-2xl mb-4">Conecta con profesionales y empresas de confianza en tu ciudad. Busca, filtra y encuentra lo que necesitas en segundos.</p>
            <a href="#servicios" class="inline-block px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 to-violet-500 text-white font-bold text-lg shadow hover:from-violet-600 hover:to-blue-600 transition">Explorar servicios</a>
        </section>
        <!-- Categorías Populares -->
        <section id="servicios" class="w-full flex flex-col items-center gap-8">
            <h2 class="text-2xl font-bold text-blue-700 mb-4">Categorías populares</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 w-full max-w-5xl mx-auto">

                <div class="bg-white/90 rounded-xl shadow-lg flex flex-col items-center p-6 hover:scale-105 transition">
                    <img src="/images/categoria1.webp" alt="Belleza" class="w-16 h-16 rounded-full mb-2 object-cover">
                    <span class="text-blue-700 font-semibold">Belleza</span>
                </div>
                <div class="bg-white/90 rounded-xl shadow-lg flex flex-col items-center p-6 hover:scale-105 transition">
                    <img src="/images/categoria2.jpg" alt="Reparaciones" class="w-16 h-16 rounded-full mb-2 object-cover">
                    <span class="text-blue-700 font-semibold">Reparaciones</span>
                </div>
                <div class="bg-white/90 rounded-xl shadow-lg flex flex-col items-center p-6 hover:scale-105 transition">
                    <img src="/images/categoria3.jpg" alt="Hogar" class="w-16 h-16 rounded-full mb-2 object-cover">
                    <span class="text-blue-700 font-semibold">Hogar</span>
                </div>
                <div class="bg-white/90 rounded-xl shadow-lg flex flex-col items-center p-6 hover:scale-105 transition">
                    <img src="/images/categoria4.webp" alt="Educación" class="w-16 h-16 rounded-full mb-2 object-cover">
                    <span class="text-blue-700 font-semibold">Educación</span>
                </div>
            </div>
        </section>
        <!-- Slider destacado -->
        <section class="w-full flex flex-col items-center">
                <livewire:slider />
        </section>
        <!-- Panel de filtros y resultados -->
        <section class="w-full flex flex-col md:flex-row gap-10 px-4 sm:px-6">

            <aside class="w-full md:w-1/3">
                <div class="bg-white/80 rounded-2xl shadow-2xl p-8 sticky top-36 border-l-8 border-blue-400/60">
                    <livewire:filters />
                </div>
            </aside>
            <section class="w-full md:w-2/3">
                <livewire:search-bar />
                <div class="mt-8">
                        <livewire:results-grid />
                    </div>
            </section>
        </section>
        <!-- Testimonios -->
        <section class="w-full flex flex-col items-center gap-8 mt-8">
            <h2 class="text-2xl font-bold text-blue-700 mb-4">Testimonios</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 w-full max-w-6xl mx-auto px-2">

                <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <span class="text-5xl mb-2">🌟</span>
                    <p class="text-gray-700 mb-2">“Encontré un plomero excelente en minutos. ¡Muy recomendado!”</p>
                    <span class="text-blue-700 font-semibold">Ana G.</span>
                </div>
                <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <span class="text-5xl mb-2">💇‍♂️</span>
                    <p class="text-gray-700 mb-2">“Reservé un corte de cabello a domicilio y fue súper fácil.”</p>
                    <span class="text-blue-700 font-semibold">Carlos M.</span>
                </div>
                <div class="bg-white/90 rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <span class="text-5xl mb-2">🔧</span>
                    <p class="text-gray-700 mb-2">“La app me ayudó a encontrar ayuda para reparar mi lavadora.”</p>
                    <span class="text-blue-700 font-semibold">Lucía R.</span>
                </div>
            </div>
        </section>
    </main>
    <footer class="w-full bg-white/80 mt-16 py-8 border-t border-blue-100 text-center text-gray-500 text-sm">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 px-4">
            <span>© 2024 MyWork. Todos los derechos reservados.</span>
            <div class="flex gap-4">
                <a href="/nosotros" class="hover:text-blue-700">Nosotros</a>
                <a href="#" class="hover:text-blue-700">Contacto</a>
                <a href="#" class="hover:text-blue-700">Términos</a>
                </div>
        </div>
    </footer>
    @livewireScripts
    </body>
</html>
