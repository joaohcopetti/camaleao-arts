<script setup lang="ts">
import { Art, Paginated } from '@/types'
import ArtCard from './partials/ArtCard.vue'

type TheArtProps = {
  arts: Paginated<Art>
}

defineProps<TheArtProps>()
</script>

<template>
  <AppCard>
    <template #body>
      <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
        <ArtCard
          v-for="art in arts.data"
          :key="art.id"
          :art="art"
        />
      </div>
    </template>
  </AppCard>
</template>
