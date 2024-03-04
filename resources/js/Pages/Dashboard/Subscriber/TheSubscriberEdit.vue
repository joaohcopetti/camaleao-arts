<script setup lang="ts">
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import SubscribersForm from './partials/SubscribersForm.vue'
import { User } from '@/types'
import { Link } from '@inertiajs/vue3'

defineProps<{
  user: User
}>()
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

    <AppCard>
      <template #body>
        <SubscribersForm :user="user" />
      </template>
    </AppCard>
  </DashboardLayout>
</template>
