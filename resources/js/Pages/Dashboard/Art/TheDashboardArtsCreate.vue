<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import ArtsForm from './partials/ArtsForm.vue'
import DashboardLayout from '@/layouts/DashboardLayout.vue'

defineProps<{
  categories: object[]
}>()

const onBackClick = () => {
  router.visit(route('dashboard.arts.index'))
}
</script>

<template>
  <DashboardLayout>
    <template #header>
      <AppButton
        icon="fas fa-arrow-left"
        label="Voltar"
        class="btn-primary btn-outline"
        @click.prevent="onBackClick"
      />
    </template>

    <AppCard>
      <template #title>
        <FWIcon
          icon="fas fa-plus"
          fixed-width
        />
        Cadastre uma nova arte
      </template>
      <template #body>
        <ArtsForm :categories="categories" />
      </template>
    </AppCard>
  </DashboardLayout>
</template>
