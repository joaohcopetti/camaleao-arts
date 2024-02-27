<script setup lang="ts">
import { useRouteStore } from '@/store/route-store'
import { Category } from '@/types'
import { Link } from '@inertiajs/vue3'
defineProps<{ categories: Category[] }>()

const routeStore = useRouteStore()
</script>

<template>
  <ul
    class="menu menu-sm sm:menu-md w-52 sm:w-auto rounded-box bg-base-100 sm:menu-horizontal dropdown-content mt-3 sm:mt-0 z-[1] p-2 sm:p-0 px-1 gap-0 sm:gap-2"
  >
    <li>
      <Link
        :href="route('arts.index')"
        :class="{
          'btn-active font-bold': routeStore.isCurrent('arts.*')
        }"
      >
        Artes
      </Link>
    </li>
    <li>
      <details>
        <summary>Categorias</summary>
        <ul class="p-2">
          <li
            v-for="category in categories"
            :key="category.id"
          >
            <a>{{ category.name }}</a>
          </li>
        </ul>
      </details>
    </li>
  </ul>
</template>
