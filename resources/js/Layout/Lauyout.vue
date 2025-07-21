<template>
    <header>
        <Head>My App</Head>
         <nav class="bg-gray-800 text-white p-1 shadow">
            <ul class="flex space-x-6 justify-star ">
                <li>
                    <Link class="btn btn-primary text-white fs-3 mt-3"
                    :href="`/authors`" 
                    >
                        Autores
                    </Link>
                </li>

                <li>
                    <Link class="btn btn-primary text-white fs-3 mt-3" 
                    :href="`/books`"
                    >
                        Libros
                    </Link>
                </li>
            </ul>
        </nav>

    </header>

    <div class="min-h-screen bg-[#121212] text-[#E0E0E0] p-6 ">
        <div class="bg-[#1E1E1E] rounded-xl shadow-lg p-6 mx-auto" style="max-width: 1200px;">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
    import { Head, Link, router, usePage } from '@inertiajs/vue3';

</script>

