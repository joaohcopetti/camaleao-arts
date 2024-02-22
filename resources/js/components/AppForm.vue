<script setup lang="ts">
import { type VisitOptions } from '@inertiajs/core'
import { computed } from 'vue'
import type { AppFormProps } from '@/types/components'

const emit = defineEmits(['success', 'error'])
const props = withDefaults(defineProps<AppFormProps>(), {
  method: 'post',
  transformedData: () => ({}),
})

const transformedForm = computed(() =>
  props.form.transform((data) => ({
    _method: props.method,
    ...data,
    ...props.transformedData(),
  })),
)

const submit = (options?: Partial<VisitOptions>) => {
  transformedForm.value.post(props.endpoint, options)
}

const onSubmit = () => {
  submit({
    onSuccess() {
      emit('success')
    },
    onError() {
      emit('error')
    },
  })
}

const onFocus = (event: Event) => {
  const target = event.target as HTMLInputElement

  props.form.clearErrors(target.name as never)
}
</script>

<template>
  <form
    @submit.prevent="onSubmit"
    @focus.capture="onFocus"
  >
    <slot />

    <slot name="footer" />
  </form>
</template>
