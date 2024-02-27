<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: ''
})

const onSuccess = () => {
  form.reset()
}
</script>

<template>
  <AppForm
    :form="form"
    :endpoint="route('dashboard.categories.store')"
    @success="onSuccess"
  >
    <AppInput
      v-model="form.name"
      name="name"
      class="flex-grow mb-4"
      label="Nome da categoria"
      placeholder="Digite um nome para a categoria..."
      :error-message="form.errors.name"
    />
    <AppButton
      :loading="form.processing"
      label="Cadastrar"
      class="btn-success btn-outline"
    />
  </AppForm>
</template>
