<script setup lang="ts">
import { useRouteStore } from '@/store/route-store'

const routeStore = useRouteStore()
</script>

<template>
  <AppNavbar />
  <div class="h-full px-10">
    <div class="mt-10 h-full">
      <slot />
    </div>
  </div>
</template>
