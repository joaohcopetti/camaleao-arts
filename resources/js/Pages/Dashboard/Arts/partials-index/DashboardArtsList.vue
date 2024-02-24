<script setup lang="ts">
import type { Art } from '@/types'
import DashboardArtsListItem from './DashboardArtsListItem.vue'

type DashboardListProps = {
  arts: Art[]
}

defineProps<DashboardListProps>()
</script>

<template>
  <div>
    <DashboardArtsListItem
      v-for="art in arts"
      :key="art.id"
      class="last:mb-0 mb-10"
      :art="art"
    />
  </div>
</template>
