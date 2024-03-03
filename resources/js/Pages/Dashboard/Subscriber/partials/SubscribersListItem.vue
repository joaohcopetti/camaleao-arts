<script setup lang="ts">
import { User } from '@/types'
import { Link } from '@inertiajs/vue3'
import { DateTime } from 'luxon'

const props = defineProps<{
  user: User
}>()
</script>

<template>
  <li class="p-4 bg-base-300 border-b border-base-100 last:border-none flex justify-between">
    <span>
      {{ user.name }}
    </span>
    <div class="flex gap-2">
      <AppButton
        :as="Link"
        :href="route('dashboard.subscribers.edit', { user: user.id })"
        class="btn-sm btn-outline btn-primary"
        icon="fas fa-edit"
      />

      <AppDropdown trigger-class="btn btn-sm btn-error btn-outline">
        <template #trigger>
          <FWIcon
            icon="fas fa-trash-alt"
            fixed-width
          />
        </template>

        <template #content>
          <div class="p-3">
            <div class="font-bold text-center mb-4">Tem certeza?</div>
            <div>
              <AppButton
                label="Confirmar"
                class="btn-sm btn-success w-full"
              />
            </div>
          </div>
        </template>
      </AppDropdown>
    </div>
  </li>
</template>
