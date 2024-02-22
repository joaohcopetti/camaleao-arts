<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import ArtsCreateForm from './partials-create/ArtsCreateForm.vue'

defineProps<{
  categories: object[]
}>()

const onBackClick = () => {
  router.visit(route('dashboard.arts.index'))
}
</script>

<template>
  <div class="w-1/2 mx-auto">
    <div class="mb-4">
      <AppButton
        icon="fas fa-arrow-left"
        @click.prevent="onBackClick"
        label="Voltar"
        class="btn-primary btn-outline"
      />
    </div>
    <AppCard>
      <template #title>
        <FWIcon icon="fas fa-plus" fixed-width />
        Cadastre uma nova arte
      </template>
      <template #body>
        <ArtsCreateForm :categories="categories" />
      </template>
    </AppCard>
  </div>
</template>
