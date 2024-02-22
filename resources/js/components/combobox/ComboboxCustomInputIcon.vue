<script setup lang="ts">
const emit = defineEmits(['remove-selected'])
defineProps<{
  loading?: boolean
  showEraseIcon: boolean
}>()

const eraseIconClicked = () => {
  emit('remove-selected')
}
</script>

<template>
  <span class="absolute right-4">
    <span
      v-if="loading"
      class="loading loading-spinner w-3"
    />
    <FWIcon
      v-else-if="showEraseIcon"
      fixed-width
      class="hover:text-black cursor-pointer"
      icon="fas fa-times"
      @click.prevent="eraseIconClicked"
    />
    <FWIcon
      v-else
      fixed-width
      icon="fas fa-sort"
      size="sm"
    />
  </span>
</template>
