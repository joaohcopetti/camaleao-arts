<script setup lang="ts">
import { Combobox } from '@headlessui/vue'
import ComboboxCustomInput from './ComboboxCustomInput.vue'
import ComboboxCustomOptions from './ComboboxCustomOptions.vue'
import { AppComboboxProps } from '@/types/components'
import { computed, ref } from 'vue'

const emit = defineEmits(['update:modelValue'])
const props = withDefaults(defineProps<AppComboboxProps>(), {
  by: 'id',
  loading: false
})

const filterItem = (item: any) =>
  item[props.searchProp!].toLowerCase().includes(search.value.toLowerCase())

const search = ref('')
const computedItems = computed(() =>
  props.searchProp ? props.items.filter(filterItem) : props.items
)

const onSearch = (event: Event) => {
  const target = event.target as HTMLInputElement

  search.value = target.value
}

const onSelect = (value: any) => {
  emit('update:modelValue', value)

  if (value === null) {
    search.value = ''
    return
  }

  if (props.searchProp) {
    search.value = value[props.searchProp]
    return
  }
}

const onRemoveSelected = () => {
  search.value = ''
  emit('update:modelValue', null)
}
</script>

<template>
  <Combobox as="div" :model-value="modelValue" :by="by" @update:model-value="onSelect">
    <ComboboxCustomInput
      v-bind="{
        name,
        modelValue,
        placeholder,
        label,
        loading,
        displayValue,
        error,
        errorMessage
      }"
      @remove-selected="onRemoveSelected"
      @input="onSearch"
    />

    <ComboboxCustomOptions :items="computedItems" :by="by">
      <template #option="item">
        <slot name="option" v-bind="item" />
      </template>
    </ComboboxCustomOptions>
  </Combobox>
</template>
