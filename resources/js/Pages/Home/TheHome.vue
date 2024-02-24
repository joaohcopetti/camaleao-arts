<script setup lang="ts">
import { Category, Paginated } from '@/types'
import { ref } from 'vue'

defineProps<{
  categories: Paginated<Category>
}>()

const item = ref(null)
</script>

<template>
  <div>
    <AppCombobox v-model="item" :items="categories.data" display-prop="name" filter-by="name" />
    {{ item }}
  </div>
</template>
