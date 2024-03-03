<script setup lang="ts">
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <DashboardLayout>
    <template #action-button>
      <AppButton
        :as="Link"
        class="btn-outline btn-primary"
        icon="fas fa-arrow-left"
        label="Voltar"
        :href="route('dashboard.subscribers.index')"
      />
    </template>
  </DashboardLayout>
</template>
