<template>
    <title>Create</title>

    <Lauyout>
        <div>
            <h1 class="text-center mb-4 text-white">Crear Autor</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">
                <div>
                    <label for="Nombre" class="ml-3 fw-bold fs-5">Nombre</label>
                    <input 
                        v-model="first_name" 
                        type="text" 
                        name="Nombre" 
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                        :class="{ 'is-invalid': errors.first_name }"
                    >
                    <span v-if="errors.first_name" class="invalid-feedback d-block">{{ errors.first_name }}</span>
                </div>
                
                <div>
                    <label for="Apellido" class="ml-3 fw-bold fs-5">Apellido</label>
                    <input 
                        v-model="last_name" 
                        type="text" 
                        name="Apellido"
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                        :class="{ 'is-invalid': errors.last_name }"
                    >
                    <span v-if="errors.last_name" class="invalid-feedback d-block">{{ errors.last_name }}</span>
                </div>
                
                <div>
                    <label for="País" class="ml-3 fw-bold fs-5">País</label>
                    <input 
                        v-model="country" 
                        type="text" 
                        name="País"
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                        :class="{ 'is-invalid': errors.country }"
                    >
                    <span v-if="errors.country" class="invalid-feedback d-block">{{ errors.country }}</span>
                </div>
                

                <button type="submit" class="btn btn-success rounded-pill py-2 px-4 ml-3 fw-bold fs-5">Guardar</button>

            </form>
        </div>
    </Lauyout>
</template>

<script setup>
     //importaciones
    import {ref, computed} from 'vue';
    import { Head, Link, router, usePage } from '@inertiajs/vue3';


    import Lauyout from '../../Layout/Lauyout.vue';


    //Datos
    const first_name = ref('');
    const last_name = ref('');
    const country = ref('');

    const errors = computed(
        () => usePage().props.errors
    );
   
    
    //funciones
    function submit(){
        router.post('/authors', {
            first_name: first_name.value,
            last_name: last_name.value,
            country: country.value,
        }, {
            onSuccess: () => {
                first_name.value = '';
                last_name.value = '';
                country.value = '';
            },
            onError: (errorObject) => {
            console.error('Errores de validación:', errorObject);
            console.log('Claves de los errores:', Object.keys(errorObject));
        }
        });
    }

</script>