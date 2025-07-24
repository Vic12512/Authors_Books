<template>
    <title>Show</title>

    <Layout> 
        <div class="text-center p-6 bg-[#1a1a1a] text-gray-200 rounded-lg shadow-lg max-w-3xl mx-auto mt-10">
            <h1 class="text-3xl font-bold text-[#4ade80] mb-8 border-b border-gray-700 pb-4">Detalles del Autor</h1>

            <div class="space-y-4">

                <!-- Muestra el nombre del autor -->
                <p  class="text-lg">
                    <strong class="text-[#67e8f9]">
                        Nombre:
                    </strong>
                    <span class="ml-2">
                        {{ author.first_name }} {{ author.last_name }}
                    </span>
                </p>
                
                <!-- Muestra el Pais del autor -->
                <p class="text-lg">
                    <strong class="text-[#67e8f9]">
                        País:
                    </strong>
                    <span class="ml-2">
                        {{ author.country }}
                    </span>
                </p>

                <!-- Muestra el Dia de Registro del autor -->
                <p class="text-lg">
                    <strong class="text-[#67e8f9]">
                        Fecha de registro:
                    </strong>
                    <span class="ml-2">
                        {{ new Date(author.created_at).toLocaleDateString() }}
                    </span>
                </p>
            </div>

            <div class="mt-10">
                <!-- Muestra la cantidad de libros escrita por el autor -->
                <h2 class="text-xl font-semibold text-[#4ade80] mb-4">
                    Libros {{ author.books_count }} 
                </h2>

                <!-- Muestra los nombre de los libros escritos por el autor -->
                <ul class="list-disc list-inside text-gray-300 space-y-2 mr-10">
                    <li v-for="book in author.books" :key="book.id">
                        {{book.name}}
                    </li>
                </ul>
            </div>
        </div>
           
    </Layout>

</template>

<script setup>
    //importaciones
    import Layout from '../../Layout/Layout.vue';

    //Datos
    defineProps({
        author: Object
    });

</script>