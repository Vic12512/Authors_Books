<template>
    <title>Edit</title>

    <Lauyout>
        <div class=" mb-4">
            <h1 class="text-center mb-4 text-white">Editar Libros</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">
                <label for="Nombre" class="ml-3 fw-bold fs-5">Nombre</label>
                <input 
                    v-model="form.name" 
                    type="text" 
                    name="Nombre" id="Nombre"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"   
                >

                <label for="Fecha de publicación" class="ml-3 fw-bold fs-5">Fecha de publicación</label>
                <input 
                    v-model="form.publication_date" 
                    type="date" 
                    name="Fecha de publicación" 
                    id="Fecha de publicación"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"   
                >

                <label for="Edición" class="ml-3 fw-bold fs-5">Edición</label>
                <input 
                    v-model="form.edition" 
                    type="text" 
                    name="Edición" id="Edición"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >
                <button type="submit" class="btn btn-success rounded-pill py-2 px-4 ml-3 fw-bold fs-5">Actualizar</button>

            </form>
        </div>
    </Lauyout>
</template>

<script setup>
    //importaciones
    import {useForm} from '@inertiajs/vue3';
    import {router} from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    import Lauyout from '../../Layout/Lauyout.vue';

    //Datos
    const props = defineProps({
        book: Object
    });

    const form = useForm({
        name: props.book.name,
        publication_date: props.book.publication_date,
        edition: props.book.edition
    })
    
    //funciones
    function submit(){
        form.put(`/books/${props.book.id}`)
    }

</script>