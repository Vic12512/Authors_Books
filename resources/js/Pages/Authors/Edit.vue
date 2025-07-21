<template>
    <title>Edit</title>

    <div>
        <h1>Editar Autor</h1>
        <form @submit.prevent="submit">
            <label for="Nombre">Nombre</label>
            <input 
                v-model="form.first_name" type="text" name="Nombre" id="Nombre">

            <label for="Apellido">Apellido</label>
            <input v-model="form.last_name" type="text" name="Apellido" id="Apellido">

            <label for="País">País</label>
            <input v-model="form.country" type="text" name="País" id="País">
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
        author: Object
    });

    const form = useForm({
        first_name: props.author.first_name,
        last_name: props.author.last_name,
        country: props.author.country
    })
    
    //funciones
    function submit(){
        form.put(`/authors/${props.author.id}`)
    }

</script>