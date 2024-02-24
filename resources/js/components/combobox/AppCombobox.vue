<script setup lang="ts">
import { ref, computed } from 'vue'
import {
  Combobox,
  ComboboxInput,
  ComboboxButton,
  ComboboxOptions,
  ComboboxOption
} from '@headlessui/vue'
import InputLabel from '../input/InputLabel.vue'
import InputFooter from '../input/InputFooter.vue'

type AppComboboxProps = {
  name: string
  by?: string
  placeholder?: string
  label?: string
  filterBy: string
  items: { [prop: string]: any }[]
  displayProp: string
  errorMessage?: string
  hint?: string
}

const props = withDefaults(defineProps<AppComboboxProps>(), {
  by: 'id',
  placeholder: undefined,
  label: undefined,
  errorMessage: undefined,
  hint: undefined
})

const modelValue = defineModel<any>()
const query = ref('')

const computedItems = computed(() =>
  query.value === ''
    ? props.items
    : props.items.filter((item: any) =>
        item[props.filterBy]
          .toLowerCase()
          .replace(/\s+/g, '')
          .includes(query.value.toLowerCase().replace(/\s+/g, ''))
      )
)

const onInput = (event: Event) => {
  const target = event.target as HTMLInputElement

  if (target.value === '') {
    modelValue.value = null
  }

  query.value = target.value
}
</script>

<template>
  <Combobox
    v-model="modelValue"
    class="w-full"
  >
    <div class="static mt-1">
      <ComboboxButton class="w-full cursor-default">
        <InputLabel v-if="label"> {{ label }}</InputLabel>
        <label class="input input-bordered focus-within:input-primary flex items-center gap-2 pr-0">
          <ComboboxInput
            autocomplete="off"
            :name="name"
            :placeholder="placeholder"
            class="w-full grow"
            :class="{
              'input-error': errorMessage
            }"
            :display-value="(item: any) => (item ? item[displayProp] : '')"
            @change="onInput"
          />
          <div
            class="h-full items-center flex px-3 group cursor-pointer"
            @click.prevent="modelValue = null"
          >
            <FWIcon
              v-if="modelValue"
              icon="fas fa-times"
              fixed-width
              class="opacity-70 group-hover:opacity-100"
              @click="modelValue = null"
            />
          </div>
        </label>
        <InputFooter
          :hint="hint"
          :error="errorMessage"
        />
      </ComboboxButton>

      <ComboboxOptions
        class="absolute mt-1 max-h-60 w-72 overflow-auto rounded-md bg-base-100 py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
      >
        <div
          v-if="computedItems.length === 0 && query !== ''"
          class="relative cursor-default select-none px-4 py-2"
        >
          Nenhum item encontrado
        </div>

        <ComboboxOption
          v-for="item in computedItems"
          :key="item[by]"
          v-slot="{ selected, active }"
          as="template"
          :value="item"
        >
          <li
            class="relative cursor-pointer select-none py-2 pl-10 pr-4"
            :class="{
              'bg-primary text-white': active,
              'bg-base-100 text-base-content': !active
            }"
          >
            <span
              class="block truncate"
              :class="{ 'font-medium': selected, 'font-normal': !selected }"
            >
              {{ item[displayProp] }}
            </span>
            <span
              v-if="selected"
              class="absolute inset-y-0 left-0 flex items-center pl-3"
              :class="{ 'text-white': active, 'text-primary': !active }"
            >
              <FWIcon icon="fas fa-check" />
            </span>
          </li>
        </ComboboxOption>
      </ComboboxOptions>
    </div>
  </Combobox>
</template>
