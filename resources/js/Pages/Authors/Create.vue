<template>
    <title>Create</title>

    <Lauyout>
        <div>
            <h1 class="text-center mb-4 text-white">Crear Autor</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">
                <label for="Nombre" class="ml-3 fw-bold fs-5">Nombre</label>
                <input 
                    v-model="first_name" 
                    type="text" 
                    placeholder="Nombre" name="Nombre" id="Nombre"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >
                <span v-if="errors.first_name" class="text-danger ml-3">{{ errors.name }}</span>

                <label for="Apellido" class="ml-3 fw-bold fs-5">Apellido</label>
                <input 
                    v-model="last_name" 
                    type="text" 
                    placeholder="Apellido" name="Apellido" id="Apellido"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >
                
                <label for="País" class="ml-3 fw-bold fs-5">País</label>
                <input 
                    v-model="country" 
                    type="text" 
                    placeholder="País" name="País" id="País"
                    class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                >

                <button type="submit" class="btn btn-success rounded-pill py-2 px-4 ml-3 fw-bold fs-5">Guardar</button>

            </form>
        </div>
    </Lauyout>
</template>

<script setup>
    /* //importaciones
    import {ref} from 'vue';
    import { Head, Link, router, usePage } from '@inertiajs/vue3';

    import Lauyout from '../../Layout/Lauyout.vue';


    //Datos
    const first_name = ref('');
    const last_name = ref('');
    const country = ref('');

    const page = usePage();
    const errors = page.props.errors;
    
    //funciones
    function submit(){
        router.post('/authors', {
            first_name: first_name.value,
            last_name: last_name.value,
            country: country.value,
        })
    } */

   

</script>