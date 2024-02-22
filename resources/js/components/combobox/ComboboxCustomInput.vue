<script setup lang="ts">
import { ComboboxInput, ComboboxButton } from '@headlessui/vue'
import { computed } from 'vue'
import { AppComboboxInputProps } from '@/types/components'

import InputFooter from '../input/InputFooter.vue'
import InputLabel from '../input/InputLabel.vue'
import ComboboxCustomInputIcon from './ComboboxCustomInputIcon.vue'

const emit = defineEmits(['remove-selected'])
const props = defineProps<AppComboboxInputProps>()

const hasError = computed(() => props.error || !!props.errorMessage)

const showEraseIcon = computed(() => !!props.modelValue)

const removeSelected = () => {
  emit('remove-selected', null)
}
</script>

<template>
  <ComboboxButton class="w-full">
    <label>
      <InputLabel>
        {{ label }}
      </InputLabel>

      <div class="relative flex items-center">
        <ComboboxInput
          v-bind="$attrs"
          class="input input-bordered w-full focus:input-primary pr-10"
          :class="{
            'input-error': hasError
          }"
          :placeholder="placeholder"
          :name="name"
          :display-value="displayValue"
          autocomplete="off"
        />

        <ComboboxCustomInputIcon
          :loading="loading"
          :show-erase-icon="showEraseIcon"
          @remove-selected="removeSelected"
        />
      </div>
      <InputFooter :error="errorMessage" :hint="hint" />
    </label>
  </ComboboxButton>
</template>
