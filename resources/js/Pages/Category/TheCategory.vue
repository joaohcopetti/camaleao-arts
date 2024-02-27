<script setup lang="ts">
import type { Category, Art, Paginated } from '@/types'
import TheArt from '../Art/TheArt.vue'

defineProps<{
  category: Category
  arts: Paginated<Art>
}>()
</script>

<template>
  <div>
    <div
      class="mb-5 text-2xl font-bold inline-block bg-gradient-to-r from-primary to-success text-transparent bg-clip-text"
    >
      <span class="uppercase">{{ category.name }}</span>
    </div>
    <TheArt :arts="arts" />
    <!-- {{ category }} -->
  </div>
</template>
