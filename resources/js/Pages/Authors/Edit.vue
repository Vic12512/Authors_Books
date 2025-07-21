<template>
    <title>Edit</title>

    <Lauyout>
        <div class="mb-4">
            <h1 class="text-center mb-4 text-white">Editar Autor</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">
                <label for="Nombre" class="ml-3 fw-bold fs-5">Nombre</label>
                <input 
                    v-model="form.first_name" 
                    type="text" 
                    name="Nombre" id="Nombre"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >

                <label for="Apellido" class="ml-3 fw-bold fs-5">Apellido</label>
                <input 
                    v-model="form.last_name" 
                    type="text" 
                    name="Apellido" id="Apellido"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >

                <label for="País" class="ml-3 fw-bold fs-5">País</label>
                <input 
                    v-model="form.country" 
                    type="text" 
                    name="País" id="País"
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