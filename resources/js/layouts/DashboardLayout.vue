<script setup lang="ts">
import { useRouteStore } from '@/store/route-store'
import { Link } from '@inertiajs/vue3'

const routeStore = useRouteStore()
</script>

<template>
  <div class="lg:w-1/2 mx-auto">
    <div class="mb-4">
      <div class="flex flex-col lg:flex-row gap-3 lg:gap-0 justify-between">
        <slot name="action-button" />
        <div v-if="!$slots['action-button']" />
        <div class="flex gap-2">
          <AppButton
            icon="fas fa-image"
            :as="Link"
            label="Artes"
            class="btn-primary flex-grow"
            :class="{ 'btn-outline': !routeStore.isCurrent('dashboard.arts.*') }"
            :href="route('dashboard.arts.index')"
          />
          <AppButton
            icon="fas fa-list"
            :as="Link"
            label="Categorias"
            class="btn-primary flex-grow"
            :class="{ 'btn-outline': !routeStore.isCurrent('dashboard.categories.*') }"
            :href="route('dashboard.categories.index')"
          />
          <AppButton
            :as="Link"
            icon="fas fa-users"
            label="Assinantes"
            class="btn-info flex-grow"
            :class="{ 'btn-outline': !routeStore.isCurrent('dashboard.subscribers.*') }"
            :href="route('dashboard.subscribers.index')"
          />
        </div>
      </div>
    </div>
    <div>
      <slot />
    </div>
  </div>
</template>
