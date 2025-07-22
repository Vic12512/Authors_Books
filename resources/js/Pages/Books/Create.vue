<template>
    <title>Create</title>

    <Lauyout>
        <div>
            <h1 class="text-center mb-4 text-white">Crear Libros</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">
                <div>
                    <label for="Nombre" class="ml-3 fw-bold fs-5">Nombre</label>
                    <input 
                        v-model="name" 
                        type="text" 
                        name="Nombre" id="Nombre"
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                        :class="{'is-invalid': errors.name}"
                    >
                    <span v-if="errors.name" class="invalid-feedback d-block">{{ errors.name }}</span>
                </div>
                
                <div>
                    <label for="Fecha de publicación" class="ml-3 fw-bold fs-5">Fecha de publicación</label>
                    <input 
                        v-model="publication_date" 
                        type="date" 
                        name="Fecha de publicación" id="Fecha de publicación"
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                        :class="{'is-invalid': errors.publication_date}"
                    >
                    <span v-if="errors.publication_date" class="invalid-feedback d-block">{{ errors.publication_date }}</span>
                </div>

                <div>
                    <label for="Edición" class="ml-3 fw-bold fs-5">Edición</label>
                    <input 
                        v-model="edition" 
                        type="text" 
                        name="Edición" id="Edición"
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                        :class="{'is-invalid': errors.edition}"
                    >
                    <span v-if="errors.edition" class="invalid-feedback d-block">{{ errors.edition }}</span>
                </div>
                
                <div>
                    <label for="Autor/es" class="ml-3 fw-bold fs-5">Autor/es</label>
                    <select 
                        v-model="bookAuthors" 
                        multiple 
                        name="Autor/es" id="Autor/es"
                        class="form-select bg-dark text-light rounded-3 shadow-sm"
                        :class="{'is-invalid': errors.authors}"
                        >
                        <option 
                            v-for="author in props.authors" 
                            :key="author.id" 
                            :value="author.id"
                            >
                            {{ author.first_name }} {{ author.last_name }}
                        </option>
                    </select>
                    <span v-if="errors.authors" class="invalid-feedback d-block">{{ errors.authors }}</span>
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
    const name = ref('');
    const publication_date = ref('');
    const edition = ref('');
    const bookAuthors = ref([]);

    const errors = computed(
        () => usePage().props.errors
    );

    const props = defineProps({
        authors: Array
    });
    
    //funciones
    function submit(){
        router.post('/books', 
            {
                name: name.value,
                publication_date: publication_date.value,
                edition: edition.value,
                authors: bookAuthors.value,
            }, 
        
            {
                onSuccess: () => {
                    name.value = '';
                    publication_date = '';
                    edition = '';
                    authors = [];
                }, 

                onError: (errorObject) => {
                    console.error('Errores de validación:', errorObject);
                    console.log('Claves de los errores:', Object.keys(errorObject));
                }
            }
        );
        
    }

</script>