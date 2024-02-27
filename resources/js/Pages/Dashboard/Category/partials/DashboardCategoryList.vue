<script setup lang="ts">
import type { Category } from '@/types'
import DashboardCategoryForm from './DashboardCategoryForm.vue'
import DashboardCategoryListItem from './DashboardCategoryListItem.vue'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

defineProps<{
  categories: Category[]
}>()

const editCategory = ref<Category>()
const form = useForm({
  name: ''
})

const onSubmitEdit = () => {
  form.submit(
    'patch',
    route('dashboard.categories.update', { category: editCategory.value!.slug }),
    {
      preserveScroll: true,
      onFinish() {
        editCategory.value = undefined
      }
    }
  )
}

const onEdit = (category: Category) => {
  editCategory.value = category
  form.name = category.name
}
</script>

<template>
  <div>
    <div class="mb-5">
      <DashboardCategoryForm />
    </div>
    <div>
      <ul class="rounded-lg overflow-hidden">
        <template
          v-for="category in categories"
          :key="category.slug"
        >
          <div
            v-if="category.id === editCategory?.id"
            class="bg-base-300"
          >
            <form
              class="p-4 gap-2 flex items-center justify-between"
              @submit.prevent="onSubmitEdit"
            >
              <AppInput
                v-model="form.name"
                class="flex-grow"
                name="name"
                :error-message="form.errors.name"
              />
              <div class="flex gap-2">
                <AppButton
                  class="btn-sm btn-outline btn-success"
                  icon="fas fa-check"
                  :loading="form.processing"
                  @click.prevent="onSubmitEdit"
                />
                <AppButton
                  class="btn-sm btn-outline"
                  icon="fas fa-times"
                  :disabled="form.processing"
                  @click.prevent="editCategory = undefined"
                />
              </div>
            </form>
          </div>
          <DashboardCategoryListItem
            v-else
            :category="category"
            @edit="onEdit"
          />
        </template>
      </ul>
    </div>
  </div>
</template>
