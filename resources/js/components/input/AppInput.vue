<script setup lang="ts">
import { computed, onMounted, ref, useSlots } from 'vue'

import type { AppInputProps } from '@/types/components'
import BaseInput from './BaseInput.vue'
import BaseInputPassword from './BaseInputPassword.vue'
import InputLabel from './InputLabel.vue'
import InputFooter from './InputFooter.vue'

const slots = useSlots()
const props = withDefaults(defineProps<AppInputProps>(), {
  type: 'text',
  mask: undefined,
  accept: undefined,
  label: undefined,
  error: false,
  hint: undefined,
  errorMessage: undefined,
  inputClass: undefined,
  autofocus: false,
  placeholder: undefined,
  autocomplete: undefined
})

const input = ref()
const model = defineModel<string | File>()

const inputClasses = computed(() => [
  props.inputClass,
  'input input-bordered w-full focus:input-primary ',
  {
    'input-error': hasError.value,
    'pr-10': !!slots['append']
  }
])

const hasError = computed(() => props.error || !!props.errorMessage)

const isTypePassword = computed(() => props.type === 'password')

const inputComponent = computed(() => (isTypePassword.value ? BaseInputPassword : BaseInput))

onMounted(() => {
  if (props.autofocus) {
    input.value.focusInput()
  }
})
</script>

<template>
  <label class="form-control">
    <InputLabel v-if="label">
      {{ label }}
    </InputLabel>

    <div class="relative flex items-center">
      <Component
        :is="inputComponent"
        ref="input"
        v-model="model"
        :class="inputClasses"
        v-bind="{
          name,
          mask,
          type,
          hasError,
          placeholder,
          autocomplete,
          accept
        }"
      />
      <span class="absolute right-4">
        <slot name="append" />
      </span>
    </div>

    <InputFooter :error="errorMessage" :hint="hint" />
  </label>
</template>
