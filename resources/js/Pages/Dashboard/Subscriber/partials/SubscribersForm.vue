<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})
</script>

<template>
  <AppForm
    :form="form"
    :endpoint="route('dashboard.subscribers.store')"
  >
    <AppInput
      v-model="form.name"
      name="name"
      label="Nome"
      autofocus
      placeholder="Digite o nome do ser humano..."
      :error-message="form.errors.name"
    />

    <AppInput
      v-model="form.email"
      name="email"
      label="E-mail"
      placeholder="Digite o e-mail do usuário..."
      :error-message="form.errors.email"
    />

    <AppInput
      v-model="form.password"
      name="password"
      label="Senha"
      placeholder="Digite a senha..."
      type="password"
      :error-message="form.errors.password"
    />

    <AppInput
      v-model="form.password_confirmation"
      name="password_confirmation"
      label="Confirme a senha"
      type="password"
      placeholder="Confirme a senha..."
    />

    <div class="mt-4">
      <AppButton
        type="submit"
        label="Cadastrar"
        class="btn-success btn-block btn-outline"
      />
    </div>
  </AppForm>
</template>
