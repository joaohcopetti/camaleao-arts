<script setup lang="ts">
import { Art, Paginated } from '@/types'
import ArtCard from './partials/ArtCard.vue'

type TheArtProps = {
  arts: Paginated<Art>
}

defineProps<TheArtProps>()
</script>

<template>
  <div>
    <AppCard>
      <template #body>
        <div
          v-if="arts.data.length"
          class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 justify-items-center"
        >
          <ArtCard
            v-for="art in arts.data"
            :key="art.id"
            :art="art"
          />
        </div>
        <div
          v-else
          class="text-center my-20"
        >
          Nenhuma arte encontrada
        </div>
      </template>
    </AppCard>
    <div class="text-center mt-5">
      <AppPagination :pagination="{ ...arts.links, ...arts.meta }" />
    </div>
  </div>
</template>
