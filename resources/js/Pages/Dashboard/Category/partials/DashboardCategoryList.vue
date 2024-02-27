<script setup lang="ts">
import type { Category } from '@/types'
import DashboardCategoryForm from './DashboardCategoryForm.vue'
import DashboardCategoryListItem from './DashboardCategoryListItem.vue'
import DashboardCategoryFormEdit from './DashboardCategoryFormEdit.vue'

import { ref } from 'vue'

defineProps<{
  categories: Category[]
}>()

const editCategory = ref<Category>()

const onEdit = (category: Category) => {
  editCategory.value = category
}
</script>

<template>
  <div>
    <div class="mb-5">
      <DashboardCategoryForm />
    </div>
    <div>
      <ul class="rounded-lg overflow-hidden">
        {{
          editCategory
        }}
        <template
          v-for="category in categories"
          :key="category.slug"
        >
          <DashboardCategoryFormEdit
            v-if="category.id === editCategory?.id"
            :key="editCategory.id"
            :category="editCategory"
            @finished="editCategory = undefined"
          />
          <DashboardCategoryListItem
            v-else
            :key="category.id"
            :category="category"
            @edit="onEdit"
          />
        </template>
      </ul>
    </div>
  </div>
</template>
