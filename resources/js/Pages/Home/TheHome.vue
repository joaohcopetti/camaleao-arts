<script setup lang="ts">
import { ref } from 'vue'

const modal = ref(false)
</script>

<template>
  <div>
    <AppButton
      label="Modal"
      @click="modal = true"
    />
  </div>
</template>
