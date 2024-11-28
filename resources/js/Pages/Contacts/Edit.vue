<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    organizations: Array,
    countries: Array,
    contact:Object
});

const update = () => {
    Inertia.put(route('contacts.update', props.contact.id), props.contact);
}

const destroy = () => {
    Inertia.delete(route('contacts.destroy', props.contact.id));
}

</script>


<template>
    <AppLayout title="Contacts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Contacto
            </h2>
        </template>

        
        <div class="container py-10"><!-- Div Contenedor -->
            <h1 class =" text-3xl font-semibold text-gray-700 mb-3">
                <span class=" text-indigo-500">Contacts / </span> Edit
            </h1>
            <div class="bg-white overflow-hidden shadow-xl rounded-lg px-4 py-10"><!-- div que crea la tarjeta blanca -->

                <div class=" grid grid-cols-2 gap-6"><!-- div que crea dos columnas para el formulario -->
                    <!-- Divs de cada componente del formulario -->
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.first_name"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.first_name }}</span>
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.last_name"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.last_name }}</span>
                    </div>
                    <div>
                        <label for="organization_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organization</label>
                        <select id="organzation_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                v-model=" contact.organization_id">
                            <option value="" selected disabled>
                                Select an organization
                            </option>
                            <option v-for="organization in props.organizations" :value="organization.id" :key="'organization-' + organization.id">
                                {{ organization.name }}
                            </option>
                        </select>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.organization_id }}</span>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                        <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.email"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.email }}</span>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.phone"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.phone }}</span>
                    </div>
                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.address"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.address }}</span>
                    </div>
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                        <input type="text" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.city"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.city }}</span>
                    </div>
                    <div>
                        <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                        <input type="text" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.state"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.state }}</span>
                    </div>
                    <div>
                        <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                        <select id="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                v-model="contact.country_id">
                            <option value="" selected disabled>
                            Select a Country
                            </option>
                            <option v-for="country in countries" :value="country.id" :key="'country-' + country.id">
                                {{ country.name }}
                            </option>
                        </select>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.country_id }}</span>
                    </div>
                    <div>
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postal Code</label>
                        <input type="text" id="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model=" contact.postal_code"/>
                        <span class=" text-sm text-red-500">{{ $page.props.errors.postal_code }}</span>
                    </div>
                </div>
                    
                <div class =" flex justify-end mt-4">
                    <button class=" btn btn-blue" @click="update">
                        Actualizar
                    </button>
                    <button class=" btn btn-red" @click="destroy">
                        Eliminar
                    </button>
                </div>
                
            </div>
        </div>  
        
    </AppLayout>
</template>