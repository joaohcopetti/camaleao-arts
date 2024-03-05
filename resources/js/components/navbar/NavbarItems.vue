<script setup lang="ts">
import { useRouteStore } from '@/store/route-store'
import { Category } from '@/types'
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

defineEmits(['item-clicked'])
const routeStore = useRouteStore()
const categories = computed<Category[]>(() => usePage().props.categories)

const categoryItems = computed(() => {
  return categories.value.map((category) => ({
    label: category.name,
    as: Link,
    props: {
      class: [
        'capitalize',
        { 'bg-base-300': routeStore.isCurrent('categories.show', { category: category.slug }) }
      ],
      href: route('categories.show', { category: category.slug })
    }
  }))
})
</script>

<template>
  <div class="flex gap-2">
    <Link
      :href="route('arts.index')"
      class="btn btn-ghost"
      :class="{
        'btn-active font-bold': routeStore.isCurrent('arts.*')
      }"
      @click="$emit('item-clicked')"
    >
      Artes
    </Link>
    <AppDropdown
      class="w-full"
      :items="categoryItems"
      chevron
      :trigger-class="[
        'btn btn-ghost w-full',
        {
          'md:btn-active': routeStore.isCurrent('categories.*')
        }
      ]"
      @item-clicked="$emit('item-clicked')"
    >
      <template #trigger> Categorias </template>
    </AppDropdown>
  </div>
</template>
