<script setup lang="ts">
import { computed, ref, useAttrs } from 'vue'
import BaseInput, { type BaseInputProps } from './BaseInput.vue'

const attrs = useAttrs()
const props = defineProps<BaseInputProps>()

const input = ref<InstanceType<typeof BaseInput> | null>(null)

const baseInputProps = computed(() => ({
  ...props,
  ...attrs,
  class: attrs.class,
  type: dynamicType.value,
}))

const dynamicType = ref(props.type)

const isDynamicTypePassword = computed(() => dynamicType.value === 'password')

const passwordIcon = computed(() =>
  isDynamicTypePassword.value ? 'far fa-eye-slash' : 'far fa-eye',
)

const togglePassword = () => {
  if (!input.value) {
    return
  }

  dynamicType.value = isDynamicTypePassword.value ? 'text' : 'password'
  input.value.focusInput()
}

defineOptions({
  inheritAttrs: false,
})
</script>

<template>
  <div class="join w-full">
    <BaseInput
      ref="input"
      class="join-item"
      v-bind="baseInputProps"
    />
    <AppButton
      class="join-item border border-base-content/20 no-animation"
      type="button"
      :icon="passwordIcon"
      @click.prevent="togglePassword"
    />
  </div>
</template>
