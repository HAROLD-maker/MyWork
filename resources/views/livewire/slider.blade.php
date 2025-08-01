<div x-data="{
    current: 0,
    images: [
        @foreach($images as $img)
            { src: '{{ asset($img->image_path) }}' }@if(!$loop->last),@endif
        @endforeach
    ],
    interval: null,
    isTransitioning: false,
    startAuto() {
        this.interval = setInterval(() => { this.next(); }, 3500);
    },
    stopAuto() {
        clearInterval(this.interval);
        this.interval = null;
    },
    next() {
        if (this.isTransitioning) return;
        this.isTransitioning = true;
        this.current = (this.current + 1) % this.images.length;
        setTimeout(() => { this.isTransitioning = false; }, 700);
    },
    prev() {
        if (this.isTransitioning) return;
        this.isTransitioning = true;
        this.current = (this.current - 1 + this.images.length) % this.images.length;
        setTimeout(() => { this.isTransitioning = false; }, 700);
    },
    goTo(idx) {
        if (this.isTransitioning) return;
        this.isTransitioning = true;
        this.current = idx;
        this.stopAuto();
        this.startAuto();
        setTimeout(() => { this.isTransitioning = false; }, 700);
    },
    getOffset(idx) {
        let offset = idx - this.current;
        if (offset > this.images.length / 2) offset -= this.images.length;
        if (offset < -this.images.length / 2) offset += this.images.length;
        return offset;
    },
    init() {
        this.startAuto();
    }
}" x-init="init" class="w-full flex flex-col items-center py-6 px-2 sm:px-4">
    <div class="w-full max-w-4xl mx-auto rounded-3xl shadow-2xl bg-white/90 p-0 flex flex-col items-center">
        <div class="relative w-full aspect-video overflow-hidden rounded-3xl">
            <template x-for="(img, idx) in images" :key="idx">
                <div
                    :class="{
                        'absolute top-0 left-0 w-full h-full flex items-center justify-center transition-all duration-700 ease-in-out': true,
                        'opacity-100 z-20': current === idx,
                        'opacity-0 z-10': current !== idx
                    }"
                >
                    <img :src="img.src" class="object-cover w-full h-full rounded-3xl shadow-lg border-4 border-blue-200" />
                </div>
            </template>
            <!-- Controles -->
            <button @click="prev" class="absolute left-4 top-1/2 -translate-y-1/2 bg-gradient-to-br from-blue-500 to-violet-500 text-white rounded-full p-3 shadow-xl hover:scale-110 transition z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <button @click="next" class="absolute right-4 top-1/2 -translate-y-1/2 bg-gradient-to-br from-blue-500 to-violet-500 text-white rounded-full p-3 shadow-xl hover:scale-110 transition z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            </button>
        </div>
        <!-- Puntos indicadores -->
        <div class="mt-6 flex gap-3 justify-center items-center">
            <template x-for="i in images.length" :key="i">
                <button @click="goTo(i-1)" :class="{'bg-gradient-to-r from-blue-500 to-violet-500 scale-125 shadow-lg': current === i - 1, 'bg-blue-200': current !== i - 1}" class="w-5 h-5 rounded-full transition-all duration-300 border-2 border-white"></button>
            </template>
        </div>
    </div>
</div>
