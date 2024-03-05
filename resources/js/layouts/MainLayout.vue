<script setup lang="ts">
import MainNavbar from '@/components/navbar/MainNavbar.vue'
import LayoutFooter from '@/components/LayoutFooter.vue'
</script>

<template>
  <MainNavbar />
  <div class="px-5 lg:px-10">
    <div class="mt-5 lg:mt-10 h-full">
      <slot />
    </div>
  </div>
  <LayoutFooter />
</template>
