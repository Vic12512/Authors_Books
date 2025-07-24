
<template>
    <title>Show</title>

    <Layout> 
        <div class="text-center p-6 bg-[#1a1a1a] text-gray-200 rounded-lg shadow-lg max-w-3xl mx-auto mt-10" >
            <h1 class="text-3xl font-bold text-[#4ade80] mb-8 border-b border-gray-700 pb-4">Detalles del Libro</h1>

            <div class="space-y-4">

                <!-- Muestra el nombre del libro -->
                <p  class="text-lg">
                    <strong class="text-[#67e8f9]">
                        Nombre:
                    </strong>
                    <span class="ml-2">
                        {{ book.name }} 
                    </span>
                </p>

                <!-- Muestra la edicion del libro -->
                <p class="text-lg">
                    <strong class="text-[#67e8f9]">
                        Edición:
                    </strong>
                    <span class="ml-2">
                        {{ book.edition }}
                    </span>
                </p>
                
                <!-- Muestra la fecha de publicacion -->
                <p class="text-lg">
                    <strong class="text-[#67e8f9]">
                        Fecha de publicación:
                    </strong>
                    <span class="ml-2">
                        {{ new Date(book.created_at).toLocaleDateString() }}
                    </span>
                </p>
            </div>

            <div class="mt-10">
                <h2 class="text-xl font-semibold text-[#4ade80] mb-4">
                    Autor/es
                </h2>

                <!-- Muestra el nombre del autor del libro -->
                <ul class="list-disc list-inside text-gray-300 space-y-2 mr-10">
                    <li v-for="author in book.authors" :key="author.id">
                        {{author.first_name}} {{author.last_name}}
                    </li>
                </ul>
            </div>
        </div>
           
    </Layout>

</template>

<script setup>
    //importaciones
    import Layout from '../../Layout/Layout.vue';

    //datos
    const props = defineProps({
        book: Object
    });

</script>