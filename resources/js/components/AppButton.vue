<script setup lang="ts">
import { computed } from 'vue'
import { FontAwesomeIcon as FWIcon } from '@fortawesome/vue-fontawesome'
import { AppButtonProps } from '@/types/components'

const props = defineProps<AppButtonProps>()

const disabled = computed(() => props.loading)
</script>

<template>
  <button
    class="btn"
    :disabled="disabled"
  >
    <span
      v-if="loading"
      class="loading loading-spinner"
    />
    <FWIcon
      v-else-if="icon"
      :icon="icon"
      fixed-width
    />
    <span v-if="label">{{ label }}</span>
  </button>
</template>
