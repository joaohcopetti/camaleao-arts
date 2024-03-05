<script setup lang="ts">
import { Art, Paginated } from '@/types'

import DashboardLayout from '@/layouts/DashboardLayout.vue'
import DashboardArtsList from './partials-index/DashboardArtsList.vue'
import { Link } from '@inertiajs/vue3'

type TheDashboardArtsProps = {
  arts: Paginated<Art>
}

defineProps<TheDashboardArtsProps>()
</script>

<template>
  <DashboardLayout>
    <template #action-button>
      <AppButton
        :as="Link"
        :href="route('dashboard.arts.create')"
        icon="fas fa-plus"
        label="Nova arte"
        class="btn-success"
      />
    </template>
    <AppCard>
      <template #body>
        <DashboardArtsList :arts="arts.data" />
      </template>
    </AppCard>
    <div class="text-center mt-5">
      <AppPagination :pagination="{ ...arts.links, ...arts.meta }" />
    </div>
  </DashboardLayout>
</template>
