<script setup lang="ts">
import InputError from './InputError.vue'
import InputHint from './InputHint.vue'

interface InputFooterProps {
  error?: string
  hint?: string | string[]
}

defineProps<InputFooterProps>()
</script>

<template>
  <div class="label flex-col items-start">
    <InputError :error="error" />
    <template v-if="Array.isArray(hint)">
      <InputHint
        v-for="h in hint"
        :key="h"
        :hint="h"
      />
    </template>
    <InputHint
      v-else
      :hint="hint"
    />
  </div>
</template>
