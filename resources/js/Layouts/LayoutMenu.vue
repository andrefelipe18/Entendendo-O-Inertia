<template>
    <div class="p-5 text-center text-blue-600">
        <Link :href="route('home')" :class="{'text-red-900': $page.url === '/home' }" class="p-3 bg-gray-300 mr-2 rounded-sm">Posts</Link>
        <Link :href="route('about')" :class="{'text-red-900': $page.url === '/about' }" class="p-3 bg-gray-300 mr-2 rounded-sm">Sobre</Link>
    </div>
</template>
<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: 'LayoutMenu',
    components: {
        Link
    } //p-3 bg-gray-100 mr-2 rounded-sm
}
</script>
<style>

</style>
