<script setup lang="ts">
import { nextTick, ref } from 'vue'
import { vMaska } from 'maska'

export interface BaseInputProps {
  type: 'text' | 'password'
  mask?: string | string[]
  hasError: boolean
}

const emit = defineEmits(['update:modelValue'])
defineProps<BaseInputProps>()

const input = ref<HTMLInputElement | null>(null)
const model = defineModel<string | File>()

const focusInput = async () => {
  if (!input.value) {
    return
  }

  await nextTick()

  input.value.focus()
  input.value.setSelectionRange(99999, 99999)
}

const onInput = (event: Event) => {
  const target = event.target as HTMLInputElement

  emit('update:modelValue', target.value)
}

defineExpose({
  focusInput,
})
</script>

<template>
  <input
    ref="input"
    v-maska
    data-maska-eager
    :data-maska="mask"
    :value="model"
    :type="type"
    @input="onInput"
  />
</template>
