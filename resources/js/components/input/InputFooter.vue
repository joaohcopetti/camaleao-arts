<script setup lang="ts">
import InputError from './InputError.vue'
import InputHint from './InputHint.vue'

interface InputFooterProps {
  error?: string
  hint?: string
}

defineProps<InputFooterProps>()
</script>

<template>
  <div class="label flex-col items-start">
    <InputError :error="error" />
    <InputHint :hint="hint" />
  </div>
</template>
