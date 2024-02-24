<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  email: '',
  password: ''
})
</script>

<template>
  <AppForm :form="form" :endpoint="route('auth.store')">
    {{ $attrs.errors }}
    <AppInput
      v-model="form.email"
      placeholder="Digite seu e-mail..."
      label="E-mail"
      name="email"
      :error-message="form.errors.email"
    />
    <AppInput
      v-model="form.password"
      class="mb-5"
      placeholder="Digite sua senha..."
      type="password"
      label="Senha"
      name="password"
      :error-message="form.errors.password"
    />
    <AppButton :loading="form.processing" label="Entrar" class="w-full btn-primary" />
  </AppForm>
</template>
