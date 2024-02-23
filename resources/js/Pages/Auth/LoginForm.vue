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
      class="mb-5"
      v-model="form.password"
      placeholder="Digite sua senha..."
      type="password"
      label="Senha"
      name="password"
      :error-message="form.errors.password"
    />
    <AppButton label="Entrar" class="w-full btn-primary" />
  </AppForm>
</template>
