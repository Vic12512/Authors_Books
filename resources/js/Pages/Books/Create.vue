<template>
    <title>Create</title>

    <Layout>
        <div>
            <h1 class="text-center mb-4 text-white">Crear Libros</h1>

            <form @submit.prevent="submit" class="d-grid gap-3">

                <!-- Campo para el nombre -->
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
                
                <!-- Campo para la fecha e publicacion -->
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

                <!-- Campo para la edicion -->
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
                
                <!-- <div>
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
                </div> -->

                <!-- Campo para los autores -->
                <div>
                    <label for="Autor/es" class="ml-3 fw-bold fs-5">Autor/es</label>
                    <Multiselect
                        v-model="bookAuthors"
                        :options="authorsWithFullName"
                        :multiple="true"
                        :close-on-select="false"
                        label="fullName"
                        track-by="id"
                        placeholder="Selecciona uno o varios autores"
                        class="rounded-3 shadow-sm"
                    />
                    <span v-if="errors.authors" class="invalid-feedback d-block">{{ errors.authors }}</span>
                </div>

                <button type="submit" class="btn btn-success rounded-pill py-2 px-4 ml-3 fw-bold fs-5">Guardar</button>

            </form>
        </div>
    </Layout>
</template>

<script setup>
    //importaciones
    import { router, usePage,} from '@inertiajs/vue3';
    import { defineProps, ref, computed } from 'vue';
    import Layout from '../../Layout/Layout.vue';
    import Multiselect from 'vue-multiselect';
    import 'vue-multiselect/dist/vue-multiselect.min.css';

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

    const authorsWithFullName = computed(() =>
        props.authors.map(a => ({
            id: a.id,
            fullName: `${a.first_name} ${a.last_name}`
        }))
    );

    
    //funciones

    function submit(){
        const authorIds = bookAuthors.value.map(a => a.id);

        router.post('/books', 
            {
                name: name.value,
                publication_date: publication_date.value,
                edition: edition.value,
                authors: authorIds,
            }, 
        
            {
                //Limpia los campos solo si la creacion fue exitosa
                onSuccess: () => {
                    name.value = '';
                    publication_date.value = '';
                    edition.value = '';
                    bookAuthors.value = [];
                }, 

                onError: (errorObject) => {
                    console.error('Errores de validación:', errorObject);
                    console.log('Claves de los errores:', Object.keys(errorObject));
                }
            }
        );
        
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