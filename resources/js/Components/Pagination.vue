<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    pagination: Object
})

</script>

<template>
    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="flex items-center -space-x-px h-8 text-sm">
            <template v-for="(link,key) in pagination.links">
                <li :key="key" v-if="link.url == null">
                    <a
                        href="#"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        v-html="link.label">  
                    </a>
                </li>
                <li v-else>
                    <Link  
                        :key="'link-'+key"  
                        :href="link.url" 
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight "
                        v-html="link.label"
                        :class="link.active ? 'text-gray-500 bg-blue-300 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' : 'text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'">
                    </Link>
                </li>
            </template>
        </ul>
    </nav>
</template>
