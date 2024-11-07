<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from 'lodash.debounce';
import pickBy from 'lodash.pickby';


const props = defineProps({
    contacts: Object,
    filters: Object
});

let search = ref(props.filters.search);

const debouncedSendDataToBackend = debounce((value) => {
    Inertia.get('/contacts', pickBy({ search: value }), {
        preserveState: true,
    });
}, 300); // Ajusta el tiempo de debounce según tus necesidades

watch(search, (newValue) => {
    debouncedSendDataToBackend(newValue);
});

</script>

<template>
    <AppLayout title="Contacts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
            </h2>
        </template>
        <div class="py-10">

            <!-- Buscador de contactos -->

            <div class="mb-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label> -->
                <input type="text" 
                id="search" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                placeholder="Ingrese contacto, organizacion, ciudad o telefono para filtrar"
                v-model="search" 
                required />
            </div>

            

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        

                        <!-- Tabla de registros -->
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">
                                        Organization
                                    </th>
                                    <th scope="col" class="px-6 py-3">City</th>
                                    <th scope="col" class="px-6 py-3">Phone</th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                                    v-for="contact in contacts.data"
                                    :key="contact.id"
                                >
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{contact.first_name + " " +contact.last_name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ contact.organization.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ contact.city }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ contact.phone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a
                                            href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                            ><i
                                                class="fa-solid fa-angle-right"
                                            ></i
                                        ></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class=" flex justify-center py-4">
                <pagination :pagination="contacts"></pagination>
            </div>
        </div>
    
    </AppLayout>
</template>
