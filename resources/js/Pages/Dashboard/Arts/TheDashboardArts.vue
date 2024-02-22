<script setup lang="ts">
import AppButton from '@/components/AppButton.vue'
import { router } from '@inertiajs/vue3'

const onCreateClick = () => {
  router.visit(route('dashboard.arts.create'))
}
</script>

<template>
  <div class="w-1/2 mx-auto">
    <AppCard>
      <template #body>
        <AppButton
          @click.prevent="onCreateClick"
          icon="fas fa-plus"
          label="Nova arte"
          class="btn-success"
        />
      </template>
    </AppCard>
  </div>
</template>
