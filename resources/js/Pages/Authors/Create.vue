<template>
    <title>Create</title>

    <div>
        <h1>Crear Autor</h1>
        <form @submit.prevent="submit">
            <input v-model="first_name" type="text" placeholder="Nombre" name="Nombre" id="Nombre">
            <input v-model="last_name" type="text" placeholder="Apellido" name="Apellido" id="Apellido">
            <input v-model="country" type="text" placeholder="País" name="País" id="País">
            <button type="submit">Guardar</button>

        </form>
    </div>
</template>

<script setup>
    //importaciones
    import {ref} from 'vue';
    import {router} from '@inertiajs/vue3';

    //Datos
    const first_name = ref('');
    const last_name = ref('');
    const country = ref('');
    
    //funciones
    function submit(){
        router.post('/authors', {
            first_name: first_name.value,
            last_name: last_name.value,
            country: country.value,
        })
    }

</script>