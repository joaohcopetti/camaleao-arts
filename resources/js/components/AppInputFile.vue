<script setup lang="ts">
import InputLabel from './input/InputLabel.vue'
import InputFooter from './input/InputFooter.vue'
import { computed } from 'vue'

interface AppInputFileProps {
  label?: string
  name: string
  errorMessage?: string
  hint?: string
  multiple?: boolean
  value?: File | null
}

const emit = defineEmits(['change'])
const modelValue = defineModel<FileList | File | null>()

const props = withDefaults(defineProps<AppInputFileProps>(), {
  label: '',
  errorMessage: '',
  hint: '',
  multiple: false,
  value: null
})

const hasError = computed(() => !!props.errorMessage)

const setFiles = (files: FileList | File | null) => {
  emit('change', files)
  modelValue.value = files
}

const onInput = (event: Event) => {
  const target = event.target as HTMLInputElement
  const files = target.files

  if (props.multiple) {
    setFiles(files)
    return
  }

  if (files) {
    setFiles(files?.[0])
  }
}
</script>

<template>
  <label class="form-control">
    <InputLabel v-if="label">
      {{ label }}
    </InputLabel>

    <input
      class="file-input file-input-bordered file-input-primary border-base-content/20 w-full"
      :class="{ 'border-error': hasError }"
      :name="name"
      v-bind="$attrs"
      type="file"
      :multiple="multiple"
      @input="onInput"
    />

    <div class="label flex-col items-start">
      <InputFooter :error="errorMessage" :hint="hint" />
    </div>
  </label>
</template>
