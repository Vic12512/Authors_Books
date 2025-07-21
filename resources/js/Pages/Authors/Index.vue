<template>
    <title>Index</title>

    <div>
        <h1>Vista de Autores</h1>

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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script setup>
    import { Link } from '@inertiajs/vue3';

    defineProps({
        authors: Array
    });

</script>