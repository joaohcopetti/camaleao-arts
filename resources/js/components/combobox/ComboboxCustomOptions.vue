<script setup lang="ts">
import { ComboboxOptions, ComboboxOption } from '@headlessui/vue'
defineProps<{ items: any; by: string }>()
</script>

<template>
  <ComboboxOptions class="relative min-w-40 shadow-lg rounded-b-lg max-h-52 w-full">
    <ComboboxOption
      v-for="item in items"
      :key="item[by]"
      v-slot="{ selected, active }"
      :value="item"
    >
      <div
        class="px-3 py-2 transition-colors cursor-pointer"
        :class="{
          'bg-white/10': selected || active
        }"
      >
        <slot name="option" v-bind="item" />
      </div>
    </ComboboxOption>
  </ComboboxOptions>
</template>
