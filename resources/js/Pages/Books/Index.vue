<template>
    <title>Index</title>

    <Layout>
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <h1>Vista de Libros</h1>
                <div class="mb-3">
                    <a href="/books/create"
                        class="btn btn-success bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md ml-3 fw-bold fs-5">
                        Crear Libro
                    </a>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-[#2C2C2C] rounded-lg overflow-hidden">
                    <thead class="bg-[#3A3A3A] text-[#E0E0E0] ml-3 fw-bold fs-5">
                        <tr>
                            <td class="px-4 py-2 text-left">Nombre</td>
                            <td class="px-4 py-2 text-left">Fecha de publicación</td>
                            <td class="px-4 py-2 text-left">Edición</td>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        <tr v-for="book in books" :key="book.id" class="hover:bg-[#393939] border-b border-[#444]">
                            <td class="px-4 py-2">{{ book.name }}</td>
                            <td class="px-4 py-2">{{ book.publication_date }}</td>
                            <td class="px-4 py-2">{{ book.edition }}</td>
                            <td class="px-4 py-2">
                                <Link :href="`/books/${book.id}/edit`"
                                    class="btn btn-primary text-white px-3 py-1">
                                    Editar
                                </Link>
                            </td>
                            <td>
                                <button @click="DestroyBooks(book.id)"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 text-sm focus:outline-none" style="border-radius: 6px;">
                                    Eliminar
                                </button>
                            </td>
                            <td class="px-4 py-2">
                                <Link :href="`/books/${book.id}`" 
                                    class="btn btn-secondary text-white px-3 py-1">
                                    Detalles
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
    
</template>

<script setup>
    import { Head, Link, router } from '@inertiajs/vue3';
    import Layout from '../../Layout/Layout.vue';

    defineProps({
        books: Array
    });

    function DestroyBooks(id) {
        router.delete(`/books/${id}`);
    }

</script>