<template>
    <header>
        <Head>My App</Head>
    </header>

    <body class="--bs-body-bg">
        <h3>Soy layout</h3>
        <slot></slot>
    </body>
</template>

<script setup>
    import { Head } from '@inertiajs/vue3';

</script>