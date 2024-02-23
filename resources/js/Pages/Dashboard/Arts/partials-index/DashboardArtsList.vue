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
    <DashboardArtsListItem class="last:mb-0 mb-5" :art="art" v-for="art in arts" :key="art.id" />
  </div>
</template>
