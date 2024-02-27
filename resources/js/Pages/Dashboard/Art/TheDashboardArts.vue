<script setup lang="ts">
import { Art, Paginated } from '@/types'

import DashboardLayout from '@/layouts/DashboardLayout.vue'
import DashboardArtsList from './partials-index/DashboardArtsList.vue'

type TheDashboardArtsProps = {
  arts: Paginated<Art>
}

defineProps<TheDashboardArtsProps>()
</script>

<template>
  <DashboardLayout>
    <AppCard>
      <template #body>
        <DashboardArtsList :arts="arts.data" />
      </template>
    </AppCard>
  </DashboardLayout>
</template>
