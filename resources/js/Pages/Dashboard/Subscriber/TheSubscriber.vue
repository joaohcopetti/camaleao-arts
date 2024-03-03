<script setup lang="ts">
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import { Link } from '@inertiajs/vue3'
import type { User } from '@/types'
import SubscribersList from './partials/SubscribersList.vue'

type TheSubscriberProps = {
  users: User[]
}

defineProps<TheSubscriberProps>()
</script>

<template>
  <DashboardLayout>
    <template #action-button>
      <AppButton
        :as="Link"
        :href="route('dashboard.subscribers.create')"
        icon="fas fa-plus"
        label="Novo assinante"
        class="btn-success"
      />
    </template>
    <AppCard>
      <template #body>
        <SubscribersList :users="users" />
      </template>
    </AppCard>
  </DashboardLayout>
</template>
