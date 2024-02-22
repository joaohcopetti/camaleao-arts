<script setup lang="ts">
defineProps<{ hint?: string }>()
</script>

<template>
  <span
    v-if="hint"
    class="label-text-alt text-gray-500"
  >
    {{ hint }}
  </span>
</template>
