<script setup lang="ts">
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import DashboardCategoryList from './partials/DashboardCategoryList.vue'
import { Category } from '@/types'
import { Link } from '@inertiajs/vue3'

defineProps<{
  categories: Category[]
}>()
</script>

<template>
  <DashboardLayout>
    <AppCard>
      <template #body>
        <DashboardCategoryList :categories="categories" />
      </template>
    </AppCard>
  </DashboardLayout>
</template>
