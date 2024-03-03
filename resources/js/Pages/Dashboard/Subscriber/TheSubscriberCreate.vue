<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import SubscribersForm from './partials/SubscribersForm.vue'
</script>

<template>
  <DashboardLayout>
    <template #action-button>
      <AppButton
        :as="Link"
        :href="route('dashboard.subscribers.index')"
        icon="fas fa-arrow-left"
        label="Voltar"
        class="btn-primary btn-outline"
      />
    </template>
    <AppCard>
      <template #body>
        <SubscribersForm />
      </template>
    </AppCard>
  </DashboardLayout>
</template>
