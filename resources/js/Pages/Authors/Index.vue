<template>
    <title>Index</title>

    <Lauyout> 
        <div class="space-y-4">
            <div >
                <h1 class="text-2xl font-bold">Vista de Autores</h1>
                <div class="mb-3">
                    <a href="/authors/create" 
                        class="btn btn-success bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md ml-3 fw-bold fs-5">
                        Crear Autor
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-[#2C2C2C] rounded-lg overflow-hidden">
                    <thead class="bg-[#3A3A3A] text-[#E0E0E0] ml-3 fw-bold fs-5">
                        <tr>
                            <td class="px-4 py-2 text-left">Nombre</td>
                            <td class="px-4 py-2 text-left">Apellido</td>
                            <td class="px-4 py-2 text-left">País</td>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        <tr v-for="author in authors" :key="author.id" class="hover:bg-[#393939] border-b border-[#444]">
                            <td class="px-4 py-2">{{ author.first_name }}</td>
                            <td class="px-4 py-2">{{ author.last_name }}</td>
                            <td class="px-4 py-2">{{ author.country }}</td>
                            <td class="px-4 py-2">
                                <Link :href="`/authors/${author.id}/edit`" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm">
                                    Editar
                                </Link>
                            </td>
                            <td>
                                <button @click="softDestroyAuthor(author.id)" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 text-sm focus:outline-none" style="border-radius: 6px;">
                                    Ocultar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
