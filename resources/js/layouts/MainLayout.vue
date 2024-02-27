<script setup lang="ts">
import MainNavbar from '@/components/navbar/MainNavbar.vue'
</script>

<template>
  <MainNavbar />
  <div class="h-full px-10">
    <div class="mt-10 h-full">
      <slot />
    </div>
  </div>
</template>
