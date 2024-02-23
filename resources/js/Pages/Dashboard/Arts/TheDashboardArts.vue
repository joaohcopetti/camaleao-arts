<script setup lang="ts">
import { Art, Paginated } from '@/types'
import { router } from '@inertiajs/vue3'

import AppButton from '@/components/AppButton.vue'
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import DashboardArtsList from './partials-index/DashboardArtsList.vue'

type TheDashboardArtsProps = {
  arts: Paginated<Art>
}

defineProps<TheDashboardArtsProps>()

const onCreateClick = () => {
  router.visit(route('dashboard.arts.create'))
}
</script>

<template>
  <DashboardLayout>
    <template #header>
      <AppButton
        @click.prevent="onCreateClick"
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
  </DashboardLayout>
</template>
