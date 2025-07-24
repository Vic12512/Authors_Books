<template>
   <div class="min-h-screen bg-[#121212] text-[#E0E0E0] p-6 ">
            
        <div class="text-6xl md:text-7xl lg:text-8xl flex items-center justify-center mb-12">
            <p class="font-bold text-center">¡BIENVENIDO!</p>
        </div>


        <ul class="flex flex-col md:flex-row items-center justify-center gap-6">
            <li>
                <Link class="
                     w-48 h-48 md:w-64 md:h-64 lg:w-72 lg:h-72 xl:w-80 xl:h-80
                    rounded-3xl
                    flex items-center justify-center
                    text-white text-3xl md:text-4xl lg:text-5xl font-bold text-center
                    bg-[#3498db] hover:scale-105 transition-transform duration-200 ease-in-out
                    shadow-lg"
                    :href="`/authors`" 
                >
                    Autores
                </Link>
            </li>

            <li>
                <Link class="
                    w-48 h-48 md:w-64 md:h-64 lg:w-72 lg:h-72 xl:w-80 xl:h-80
                    rounded-3xl
                    flex items-center justify-center
                    text-white text-3xl md:text-4xl lg:text-5xl font-bold text-center
                    bg-[#2ecc71] hover:scale-105 transition-transform duration-200 ease-in-out
                    shadow-lg"
                    :href="`/books`"
                >
                    Libros
                </Link>
            </li>
        </ul>    
    </div>
    
</template>

<script setup>
    import { Head, Link, router, usePage } from '@inertiajs/vue3';
</script>