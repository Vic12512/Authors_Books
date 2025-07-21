<template>
    <title>Show</title>

    <Lauyout> 
        <div>
            <h1>Detalles del Autor</h1>

            <div>
                <p><strong>Nombre</strong>{{ author.first_name }} {{ author.last_name }}</p>
                <p><strong>País</strong>{{ author.country }}</p>
                <p><strong>Fecha de registro</strong>{{ new Date(author.created_at).toLocaleDateString() }}</p>
            </div>

            <div>
                <h2>Libros <span>{{ author.books_count }}</span></h2>
                <ul>
                    <li v-for="book in author.books" :key="book.id">
                        {{book.name}}
                    </li>
                </ul>
            </div>
        </div>
           
    </Lauyout>

</template>

<script setup>
    import { Link, router } from '@inertiajs/vue3';
    import Lauyout from '../../Layout/Lauyout.vue';

    defineProps({
        author: Object
    });

</script>