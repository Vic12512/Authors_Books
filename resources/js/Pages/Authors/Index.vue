<template>
    <title>Index</title>

    <Lauyout>
        <h1 class="flex">Vista de Autores</h1>

        <a href="/authors/create">Crear Autor</a>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>País</td>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="author in authors" :key="author.id">
                        <td>{{ author.first_name }}</td>
                        <td>{{ author.last_name }}</td>
                        <td>{{ author.country }}</td>
                        <td>
                            <Link :href="`/authors/${author.id}/edit`">Editar</Link>
                        </td>
                        <td>
                            <button @click="softDestroyAuthor(author.id)">Ocultar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Lauyout>

</template>

<script setup>
    import { Link, router } from '@inertiajs/vue3';
    import Lauyout from '../../Layout/Lauyout.vue';

    defineProps({
        authors: Array
    });

    function softDestroyAuthor(id) {
        router.delete(`/authors/${id}`);
    }

</script>