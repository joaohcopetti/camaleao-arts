<script setup lang="ts">
import { computed } from 'vue'

interface InputErrorProps {
  error?: string
}

const props = defineProps<InputErrorProps>()

const show = computed(() => !!props.error)
</script>

<template>
  <span v-if="show" class="label-text-alt text-error font-semibold">
    {{ error }}
  </span>
</template>
