<script setup lang="ts">
import NavbarItems from './NavbarItems.vue'

defineEmits(['item-clicked'])
</script>

<template>
  <div class="inset-0 bg-base-300/90 absolute z-50 p-10">
    <NavbarItems
      class="flex-col"
      @item-clicked="$emit('item-clicked')"
    />
  </div>
</template>
