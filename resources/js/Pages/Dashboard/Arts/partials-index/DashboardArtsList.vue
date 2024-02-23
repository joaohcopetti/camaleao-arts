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
    <DashboardArtsListItem :art="art" v-for="art in arts" :key="art.id" />
  </div>
</template>
