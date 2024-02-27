<script setup lang="ts">
import { Category } from '@/types'
import { router } from '@inertiajs/vue3'

const emit = defineEmits(['edit'])
defineProps<{ category: Category }>()

const onEditClick = (category: Category) => {
  emit('edit', category)
}

const onConfirmDelete = (category: Category) => {
  router.delete(route('dashboard.categories.destroy', { category: category.slug }))
}
</script>

<template>
  <li class="p-4 bg-base-300 border-b border-base-100 last:border-none flex justify-between">
    <span>
      {{ category.name }}
    </span>
    <div class="flex gap-2">
      <AppButton
        class="btn-sm btn-outline btn-primary"
        icon="fas fa-edit"
        @click.prevent="onEditClick(category)"
      />
      <AppDropdown trigger-class="btn btn-sm btn-error btn-outline">
        <template #trigger>
          <FWIcon
            icon="fas fa-trash-alt"
            fixed-width
          />
        </template>

        <template #content>
          <div class="p-3">
            <div class="font-bold text-center mb-4">Tem certeza?</div>
            <div>
              <AppButton
                label="Confirmar"
                class="btn-sm btn-success w-full"
                @click="onConfirmDelete(category)"
              />
            </div>
          </div>
        </template>
      </AppDropdown>
    </div>
  </li>
</template>
