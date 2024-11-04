<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    contact: Object,
})

</script>


<template>
    <AppLayout title="Contacts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
            </h2>

            <pre>
                {{ contact }}
            </pre>

        </template>
    </AppLayout>
</template>