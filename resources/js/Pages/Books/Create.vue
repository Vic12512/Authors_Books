<template>
    <title>Create</title>

    <Lauyout>
        <div>
            <h1 class="text-center mb-4 text-white">Crear Libros</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">
                <label for="Nombre" class="ml-3 fw-bold fs-5">Nombre</label>
                <input 
                    v-model="name" 
                    type="text" 
                    name="Nombre" id="Nombre"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >

                <label for="Fecha de publicación" class="ml-3 fw-bold fs-5">Fecha de publicación</label>
                <input 
                    v-model="publication_date" 
                    type="date" 
                    name="Fecha de publicación" id="Fecha de publicación"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >

                <label for="Edición" class="ml-3 fw-bold fs-5">Edición</label>
                <input 
                    v-model="edition" 
                    type="text" 
                    name="Edición" id="Edición"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >

                <label for="Autor/es" class="ml-3 fw-bold fs-5">Autor/es</label>
                <select 
                    v-model="bookAuthors" 
                    multiple 
                    name="Autor/es" id="Autor/es"
                    class="form-select bg-dark text-light rounded-3 shadow-sm"
                >
                    <option 
                        v-for="author in props.authors" 
                        :key="author.id" 
                        :value="author.id"
                    >
                        {{ author.first_name }} {{ author.last_name }}
                    </option>
                </select>
                <button type="submit" class="btn btn-success rounded-pill py-2 px-4 ml-3 fw-bold fs-5">Guardar</button>

            </form>
        </div>
    </Lauyout>
</template>

<script setup>
    //importaciones
    import {ref} from 'vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import Lauyout from '../../Layout/Lauyout.vue';


    //Datos
    const name = ref('');
    const publication_date = ref('');
    const edition = ref('');
    const bookAuthors = ref([]);

    const props = defineProps({
        authors: Array
    });
    
    //funciones
    function submit(){
        router.post('/books', {
            name: name.value,
            publication_date: publication_date.value,
            edition: edition.value,
            authors: bookAuthors.value,
        })
        console.log( name.value,
             publication_date.value,
         edition.value,
           bookAuthors.value,)
    }

</script>