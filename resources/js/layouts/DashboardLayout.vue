<script setup lang="ts">
import { useRouteStore } from '@/store/route-store'
import { Link, router } from '@inertiajs/vue3'

const routeStore = useRouteStore()
const onCreateClick = () => {
  router.visit(route('dashboard.arts.create'))
}
</script>

<template>
  <div class="w-1/2 mx-auto">
    <div class="mb-4">
      <div class="flex justify-between">
        <div v-if="routeStore.isCurrent('dashboard.arts.index')">
          <AppButton
            icon="fas fa-plus"
            label="Nova arte"
            class="btn-success"
            @click.prevent="onCreateClick"
          />
        </div>
        <div v-else />
        <div class="flex gap-2">
          <AppButton
            icon="fas fa-image"
            :as="Link"
            label="Artes"
            class="btn-primary"
            :class="{ 'btn-outline': !routeStore.isCurrent('dashboard.arts.index') }"
            :href="route('dashboard.arts.index')"
          />
          <AppButton
            icon="fas fa-list"
            :as="Link"
            label="Categorias"
            class="btn-primary"
            :class="{ 'btn-outline': !routeStore.isCurrent('dashboard.categories.index') }"
            :href="route('dashboard.categories.index')"
          />
          <AppButton
            :as="Link"
            icon="fas fa-users"
            label="Assinantes"
            class="btn-info"
            :class="{ 'btn-outline': !routeStore.isCurrent('dashboard.subscribers.index') }"
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
