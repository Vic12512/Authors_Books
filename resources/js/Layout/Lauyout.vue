<template>
    <header>
        <Head>My App</Head>
    </header>

    <div class="min-h-screen bg-[#121212] text-[#E0E0E0] p-6 ">
        <div class="bg-[#1E1E1E] rounded-xl shadow-lg p-6 mx-auto" style="max-width: 1200px;">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
    import { Head } from '@inertiajs/vue3';

</script>

