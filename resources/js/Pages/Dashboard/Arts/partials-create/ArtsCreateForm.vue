<script setup lang="ts">
import { Category } from '@/types'
import { useForm } from '@inertiajs/vue3'

type ArtsCreateForm = {
  name: string
  file?: File
  category: string
}

defineProps<{
  categories: object[]
}>()

const form = useForm<ArtsCreateForm>({
  name: '',
  file: undefined,
  category: ''
})

const onInputFile = (file: File | undefined) => {
  form.file = file
}
</script>

<template>
  <AppForm
    :form="form"
    :endpoint="route('dashboard.arts.store')"
  >
    <AppInput
      v-model="form.name"
      name="name"
      autofocus
      label="Nome"
      placeholder="Digite o nome da arte..."
      :error-message="form.errors.name"
    />
    <AppInputFile
      label="Arquivo da arte"
      name="file"
      hint="Tipos aceitos: .cdr"
      :error-message="form.errors.file"
      accept=".cdr"
      @change="onInputFile"
    />
    <AppCombobox
      v-model="form.category"
      name="category"
      placeholder="Escolha uma categoria..."
      label="Categoria"
      :items="categories"
      filter-by="name"
      display-prop="name"
      :error-message="form.errors.category"
    >
      <template #option="item"> {{ item.name }} </template>
    </AppCombobox>

    <div class="mt-4">
      <AppButton
        :loading="form.processing"
        class="btn-success btn-outline w-full"
        label="Cadastrar"
      />
    </div>
  </AppForm>
</template>
