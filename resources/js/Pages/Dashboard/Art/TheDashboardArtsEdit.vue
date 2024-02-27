<script setup lang="ts">
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import { Link } from '@inertiajs/vue3'
import ArtsForm from './partials/ArtsForm.vue'
import { Art, Category } from '@/types'

defineProps<{ art: Art; categories: Category[] }>()
</script>

<template>
  <DashboardLayout>
    <template #header>
      <AppButton
        class="btn btn-primary btn-outline"
        label="Voltar"
        icon="fas fa-arrow-left"
        :as="Link"
        :href="route('dashboard.arts.index')"
      />
    </template>

    <AppCard>
      <template #body>
        <ArtsForm
          :art="art"
          :categories="categories"
        />
      </template>
    </AppCard>
  </DashboardLayout>
</template>
