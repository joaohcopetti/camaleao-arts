<script setup lang="ts">
import { Art, Paginated } from '@/types'

type TheArtProps = {
  arts: Paginated<Art>
}

defineProps<TheArtProps>()
</script>

<template>
  <AppCard>
    <template #body>
      <div
        v-for="art in arts.data"
        :key="art.id"
      >
        {{ art.name }}
      </div>
    </template>
  </AppCard>
</template>
