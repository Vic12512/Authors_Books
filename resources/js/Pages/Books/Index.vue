<template>
    <title>Index</title>

    <div>
        <h1>Vista de Libros</h1>

        <a href="/books/create">Crear Libro</a>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Fecha de publicación</td>
                        <td>Edición</td>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="book in books" :key="book.id">
                        <td>{{ book.name }}</td>
                        <td>{{ book.publication_date }}</td>
                        <td>{{ book.edition }}</td>
                        <td>
                            <Link :href="`/books/${book.id}/edit`">Editar</Link>
                        </td>
                        <td>
                            <button @click="softDestroyBooks(books.id)">Ocultar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script setup>
    import { Link, router } from '@inertiajs/vue3';

    defineProps({
        books: Array
    });

    function softDestroyBooks(id) {
        router.delete(`/books/${id}`);
    }

</script>