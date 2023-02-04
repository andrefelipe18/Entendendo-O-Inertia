<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>
<script>
import { Link } from '@inertiajs/vue3'
export default {
  props: {
    posts: Object,
  },
  components:{
    AppLayout,
    Link
  },
  methods: {
    apagar(id){
        if(confirm('Deseja realmente apagar este post?')){
            this.$inertia.delete(route('posts.destroy', id))
        }
    }
  }
};
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        LISTAGEM DE POSTS - {{ $page.props.user.nome }} -- {{ $page.props.user.email }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <!-- Incio tabela -->
          <section class="container px-4 mx-auto">
            <div class="flex flex-col mt-6">
              <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                  class="
                    inline-block
                    min-w-full
                    py-2
                    align-middle
                    md:px-6
                    lg:px-8
                  "
                >
                <Link class="bg-gray-700 rounded-md p-2 text-emerald-500 font-bold" :href="route('posts.create')">
                    Criar post
                </Link>
                <div class="text-emerald-500 font-bold mt-2 mb-2" v-if="$page.props.flash.message">
                    {{ $page.props.flash.message }}
                </div>
                  <div
                    class="
                    mt-5
                      overflow-hidden
                      border border-gray-200
                      dark:border-gray-700
                      md:rounded-lg
                    "
                  >
                    <table
                      class="
                        min-w-full
                        divide-y divide-gray-200
                        dark:divide-gray-700
                      "
                    >
                      <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                          <th
                            scope="col"
                            class="
                              py-3.5
                              px-4
                              text-sm
                              font-normal
                              text-left
                              rtl:text-right
                              text-gray-500
                              dark:text-gray-400
                            "
                          >
                            <p
                              class="
                                flex
                                items-center
                                gap-x-3
                                focus:outline-none
                              "
                            >
                              <span>ID</span>
                            </p>
                          </th>

                          <th
                            scope="col"
                            class="
                              px-12
                              py-3.5
                              text-sm
                              font-normal
                              text-left
                              rtl:text-right
                              text-gray-500
                              dark:text-gray-400
                            "
                          >
                            Title
                          </th>
                          <th
                            scope="col"
                            class="
                              px-12
                              py-3.5
                              text-sm
                              font-normal
                              text-left
                              rtl:text-right
                              text-gray-500
                              dark:text-gray-400
                            "
                          >
                            Content
                          </th>
                          <th scope="col"
                            class="
                              px-12
                              py-3.5
                              text-sm
                              font-normal
                              text-left
                              rtl:text-right
                              text-gray-500
                              dark:text-gray-400
                            ">
                            Ações
                          </th>
                        </tr>
                      </thead>
                      <tbody
                        class="
                          bg-white
                          divide-y divide-gray-200
                          dark:divide-gray-700 dark:bg-gray-900
                        "
                      >
                        <tr v-for="post in posts" :key="post.id">
                          <td
                            class="
                              px-4
                              py-4
                              text-sm
                              font-medium
                              whitespace-nowrap
                            "
                          >
                            <div>
                              <h2
                                class="
                                  font-medium
                                  text-gray-800
                                  dark:text-white
                                "
                              >
                                {{ post.id }}
                              </h2>
                            </div>
                          </td>
                          <td
                            class="
                              px-12
                              py-4
                              text-sm
                              font-medium
                              whitespace-nowrap
                            "
                          >
                            <div
                              class="
                                inline
                                px-3
                                py-1
                                text-sm
                                font-normal
                                rounded-full
                                text-emerald-500
                                gap-x-2
                                bg-emerald-100/60
                                dark:bg-gray-800
                              "
                            >
                              {{ post.title }}
                            </div>
                          </td>
                          <td class="px-4 py-4 text-sm">
                            <div>
                              <p class="text-gray-500 dark:text-gray-400">
                                {{ post.content }}
                              </p>
                            </div>
                          </td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex justify-between">
                                    <Link :href="route('posts.edit', post.id)" class="bg-gray-700 rounded-md p-2 mr-2 text-blue-600 font-bold mb-1" >
                                        Editar
                                    </Link>
                                    <Button @click="apagar(post.id)" class="bg-gray-700 rounded-md p-2 text-red-500 font-bold mb-1"  type="button">
                                        Apagar
                                    </Button>
                                </div>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
