<template>
    <title>Edit</title>

    <div>
        <h1>Editar Libros</h1>
        <form @submit.prevent="submit">
            <label for="Nombre">Nombre</label>
            <input 
                v-model="form.name" type="text" name="Nombre" id="Nombre">

            <label for="Fecha de publicació">Fecha de publicación</label>
            <input v-model="form.publication_date" type="date" name="Fecha de publicación" id="Fecha de publicación">

            <label for="Edición">Edición</label>
            <input v-model="form.edition" type="text" name="Edición" id="Edición">
            <button type="submit">Actualizar</button>

        </form>
    </div>
</template>

<script setup>
    //importaciones
    import {useForm} from '@inertiajs/vue3';
    import {router} from '@inertiajs/vue3';
    import { defineProps } from 'vue';

    //Datos
    const props = defineProps({
        book: Object
    });

    const form = useForm({
        name: props.author.name,
        publication_date: props.author.publication_date,
        edition: props.author.edition
    })
    
    //funciones
    function submit(){
        form.put(`/authors/${props.book.id}`)
    }

</script>