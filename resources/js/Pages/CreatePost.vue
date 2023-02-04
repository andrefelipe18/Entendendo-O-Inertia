<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
defineProps({ errors: Object });
</script>
<script>
import { Link, useForm } from '@inertiajs/vue3'
export default {
  components:{
    AppLayout,
    Link
  },
  data() {
    const form = useForm({
      title: '',
      content: '',
    })
    return {
      form,
    }
  },
};
</script>

<template>
  <AppLayout title="Criar Post">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Novo Post -- <Link :href="route('dashboard')" class="text-emerald-500">Voltar</Link>
      </h2>
    </template>
          <!-- Incio Form -->
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-6">
         <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Criar Post</h2>

        <div v-if="errors.content" class="font-bold text-2xl text-red-600">{{ errors.content }}</div>
        <form @submit.prevent="form.post(route('posts.store'))">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Titulo <span v-if="errors.title" class="font-bold text-red-600"> -- {{ errors.title }}</span></label>
                <input v-model="form.title" id="title" name="title" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Conteudo </label>
                <input v-model="form.content" name="content" id="content" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Criar</button>
        </div>
        </form>
       </section>
          <!--Fim form  -->
  </AppLayout>
</template>
