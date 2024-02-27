<script setup lang="ts">
import { Category } from '@/types'
import { useForm } from '@inertiajs/vue3'

const emit = defineEmits(['finished'])
const props = defineProps<{
  category: Category
}>()

const form = useForm({
  name: props.category.name
})

const onSubmitEdit = () => {
  form.submit('patch', route('dashboard.categories.update', { category: props.category.slug }), {
    preserveScroll: true,
    onFinish: () => {
      emit('finished')
    }
  })
}
</script>

<template>
  <form
    class="p-4 gap-2 flex items-center justify-between bg-base-300"
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
        @click.prevent="emit('finished')"
      />
    </div>
  </form>
</template>
