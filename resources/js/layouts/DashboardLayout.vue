<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'

const onCreateClick = () => {
  router.visit(route('dashboard.arts.create'))
}
</script>

<template>
  <div class="w-1/2 mx-auto">
    <div class="mb-4">
      <div class="flex justify-between">
        <div>
          <AppButton
            icon="fas fa-plus"
            label="Nova arte"
            class="btn-success"
            @click.prevent="onCreateClick"
          />
        </div>
        <div class="flex gap-2">
          <AppButton
            icon="fas fa-list"
            :as="Link"
            label="Categorias"
            class="btn-outline btn-primary"
            :href="route('dashboard.categories.index')"
          />
          <AppButton
            :as="Link"
            icon="fas fa-users"
            label="Assinantes"
            class="btn-outline"
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
