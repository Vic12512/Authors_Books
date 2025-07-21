<template>
    <title>Index</title>

    <div>
        <h1>Vista de Autores</h1>

        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>País</td>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="author in authors" :key="author.id">
                        <td>{{ author.first_name }}</td>
                        <td>{{ author.last_name }}</td>
                        <td>{{ author.country }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script setup>
    defineProps({
        authors: Array
    });

</script>