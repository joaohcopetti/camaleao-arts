<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

defineProps<{
  categories: object[]
}>()

const form = useForm({
  name: '',
  file: '',
  category: ''
})

const onInputFile = (file) => {
  form.file = file
}
</script>

<template>
  <AppForm :form="form" :endpoint="route('dashboard.arts.store')">
    <AppInput
      name="name"
      autofocus
      label="Nome"
      v-model="form.name"
      placeholder="Digite o nome da arte..."
      :error-message="form.errors.name"
    />
    <AppInputFile
      @change="onInputFile"
      label="Arquivo da arte"
      name="file"
      hint="Tipos aceitos: .cdr"
      :error-message="form.errors.file"
      accept=".cdr"
    />
    <AppCombobox
      placeholder="Escolha uma categoria..."
      v-model="form.category"
      name="category"
      label="Categoria"
      :items="categories"
      :display-value="(item: object) => (item ? item['name'] : '')"
      search-prop="name"
      :error-message="form.errors.category"
    >
      <template #option="item"> {{ item.name }} </template>
    </AppCombobox>

    <div class="mt-4">
      <AppButton class="btn-success btn-outline w-full" label="Cadastrar" />
    </div>
  </AppForm>
</template>
