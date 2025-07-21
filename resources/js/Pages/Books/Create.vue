<template>
    <title>Create</title>

    <div>
        <h1>Crear Libros</h1>
        <form @submit.prevent="submit">
            <input v-model="name" type="text" placeholder="Nombre" name="Nombre" id="Nombre">
            <input v-model="publication_date" type="date" placeholder="Fecha de publicación" name="Fecha de publicación" id="Fecha de publicación">
            <input v-model="edition" type="text" placeholder="Edición" name="Edición" id="Edición">
            <button type="submit">Guardar</button>

        </form>
    </div>
</template>

<script setup>
    //importaciones
    import {ref} from 'vue';
    import {router} from '@inertiajs/vue3';

    //Datos
    const name = ref('');
    const publication_date = ref('');
    const edition = ref('');
    
    //funciones
    function submit(){
        router.post('/books', {
            name: name.value,
            publication_date: publication_date.value,
            edition: edition.value,
        })
    }

</script>