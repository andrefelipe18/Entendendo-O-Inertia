<script>
import LayoutMenu  from '../Layouts/LayoutMenu.vue'
import { Head } from '@inertiajs/vue3'
export default {
    name: 'About',
    props: {
        name: String
    },
    components: {
        LayoutMenu,
        Head
    }
}
</script>
<template>
    <Head>
        <title>Sobre</title>
    </Head>
    <LayoutMenu></LayoutMenu>
    <h2>Nome: {{ name }}</h2>
</template>

<style>

</style>
