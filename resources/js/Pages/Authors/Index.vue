<template>
    <title>Index</title>

    <Layout> 
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <h1>Vista de Autores</h1>

                <!-- Boton Crea un Autor -->
                <div class="mb-3">
                    <a href="/authors/create" 
                        class="btn btn-success bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md ml-3 fw-bold fs-5">
                        Crear Autor
                    </a>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-[#2C2C2C] rounded-lg overflow-hidden">

                    <!-- Encabezados de tabla -->
                    <thead class="bg-[#3A3A3A] text-[#E0E0E0] ml-3 fw-bold fs-5">
                        <tr>
                            <td class="px-4 py-2 text-left">Nombre</td>
                            <td class="px-4 py-2 text-left">Apellido</td>
                            <td class="px-4 py-2 text-left">País</td>
                        </tr>
                    </thead>
                    
                    <tbody class="table-group-divider">
                        <tr v-for="author in authors" :key="author.id" class="hover:bg-[#393939] border-b border-[#444]">

                            <!-- Datos de autor -->
                            <td class="px-4 py-2">{{ author.first_name }}</td>
                            <td class="px-4 py-2">{{ author.last_name }}</td>
                            <td class="px-4 py-2">{{ author.country }}</td>
                            <td class="px-4 py-2">
                                <Link :href="`/authors/${author.id}/edit`" 
                                    class="btn btn-primary text-white px-3 py-1">
                                    Editar
                                </Link>
                            </td>
                            
                            <!-- Boton Ocultar Autor -->
                            <td>
                                <button @click="softDestroyAuthor(author.id)" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 text-sm focus:outline-none" style="border-radius: 6px;">
                                    Ocultar
                                </button>
                            </td>

                            <!-- Boton Detalle Autor -->
                            <td class="px-4 py-2">
                                <Link :href="`/authors/${author.id}`" 
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
    //importaciones
    import { Link, router } from '@inertiajs/vue3';
    import Layout from '../../Layout/Layout.vue';

    //Datos
    defineProps({
        authors: Array
    });

    //funciones
    function softDestroyAuthor(id) {
        router.delete(`/authors/${id}`);
    }

</script>
