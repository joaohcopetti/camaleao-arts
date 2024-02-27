<script setup lang="ts">
import { ref } from 'vue'

const modal = ref(false)
const items = [{ label: 'Edit' }, { label: 'Delete' }]
</script>

<template>
  <div>
    <AppDropdown :items="items">
      <template #trigger>asd </template>
    </AppDropdown>
  </div>
</template>
