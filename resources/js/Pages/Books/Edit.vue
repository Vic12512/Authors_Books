<template>
    <title>Edit</title>

    <Lauyout>
        <div class=" mb-4">
            <h1 class="text-center mb-4 text-white">Editar Libros</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">
                <div>
                    <label for="Nombre" class="ml-3 fw-bold fs-5">Nombre</label>
                    <input 
                        v-model="form.name" 
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
                        v-model="form.publication_date" 
                        type="date" 
                        name="Fecha de publicación" 
                        id="Fecha de publicación"
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"   
                        :class="{'is-invalid': errors.publication_date}"
                    >
                    <span v-if="errors.publication_date" class="invalid-feedback d-block">{{ errors.publication_date }}</span>
                </div>
                
                <div>
                    <label for="Edición" class="ml-3 fw-bold fs-5">Edición</label>
                    <input 
                        v-model="form.edition" 
                        type="text" 
                        name="Edición" id="Edición"
                        class="form-control rounded-pill bg-dark text-light border-0 shadow-sm"
                        :class="{'is-invalid': errors.edition}"
                    >
                    <span v-if="errors.edition" class="invalid-feedback d-block">{{ errors.edition }}</span>
                </div>

                <!-- <div v-if="form.authors">
                    <label for="Autor/es" class="ml-3 fw-bold fs-5">Autor/es</label>
                    <select 
                        v-model="form.authors" 
                        multiple 
                        name="Autor/es" id="Autor/es"
                        class="form-select bg-dark text-light rounded-3 shadow-sm"
                        >
                        <option 
                            v-for="author in props.authors" 
                            :key="author.id" 
                            :value="author.id" 
                            :class="{'is-invalid': errors.author}"
                            >
                            {{ author.first_name }} {{ author.last_name }}
                        </option>
                    </select>
                    <span v-if="errors.authors" class="invalid-feedback d-block">{{ errors.authors }}</span>
                </div> -->

                <div>
                    <label for="Autor/es" class="ml-3 fw-bold fs-5">Autor/es</label>
                    <Multiselect
                        v-model="selectedAuthors"
                        :options="authorsWithFullName"
                        :multiple="true"
                        :close-on-select="false"
                        label="fullName"
                        track-by="id"
                        placeholder="Selecciona uno o varios autores"                    
                    />
                    <span v-if="errors.authors" class="invalid-feedback d-block">{{ errors.authors }}</span>
                </div>
                
                <button type="submit" class="btn btn-success rounded-pill py-2 px-4 ml-3 fw-bold fs-5" preserve-scroll>Actualizar</button>

            </form>
        </div>
    </Lauyout>
</template>

<script setup>
    //importaciones
    import {useForm, usePage } from '@inertiajs/vue3';
    import { defineProps, ref,  onMounted, computed, watch } from 'vue';
    import Lauyout from '../../Layout/Lauyout.vue';
    import Multiselect from 'vue-multiselect';
    import 'vue-multiselect/dist/vue-multiselect.min.css';

    //Datos
    const props = defineProps({
        book: Object,
        authors: Array
    });

    const errors = computed(
        () => usePage().props.errors
    );

    /* 
     //carga los authores al select
    const bookAuthors = ref( 
        Array.isArray(props.book.authors)
        ? props.book.authors.map(a => a.id)
        : []
    ); */

    const form = useForm({
        name: props.book.name || '',
        publication_date: props.book.publication_date || '',
        edition: props.book.edition || '',
        authors: []
    });

    const selectedAuthors = ref([]);

    //funciones

    //se asegura que autores este seleccionados cuando ya existen
    onMounted(() => {
        if (Array.isArray(props.book.authors)) {
            selectedAuthors.value = props.book.authors.map(a => {
                return {
                    id: a.id,
                    fullName: `${a.first_name} ${a.last_name}`
                };
            });

            form.authors = selectedAuthors.value.map(a => a.id);
        }
    });

    // Sincroniza autores seleccionados con el formulario
    watch(selectedAuthors, (newVal) => {
        form.authors = newVal.map(a => a.id);
    });

   
    // Lista formateada para mostrar opciones
    const authorsWithFullName = computed(() =>
        props.authors.map(a => ({
            id: a.id,
            fullName: `${a.first_name} ${a.last_name}`
        }))
    );

    function submit(){
        form.put(`/books/${props.book.id}`)
    }

</script>

<style scoped>
.custom-multiselect .multiselect {
  background-color: #212529; /* Bootstrap dark bg */
  color: #fff;
  border: none;
  border-radius: 0.5rem;
  box-shadow: 0 0 8px rgba(0,0,0,0.3);
  padding: 0.5rem;
}

.custom-multiselect .multiselect__option--highlight {
  background-color: #343a40;
  color: #fff;
}

.custom-multiselect .multiselect__option--selected {
  background-color: #0d6efd;
  color: white;
}

.custom-multiselect .multiselect__tag {
  background-color: #198754; /* Verde bootstrap */
  border-radius: 1rem;
  padding: 2px 10px;
  font-size: 0.9rem;
}

.custom-multiselect .multiselect__tags {
  min-height: 38px;
}

.custom-multiselect .multiselect__placeholder {
  color: #ccc;
}
</style>
