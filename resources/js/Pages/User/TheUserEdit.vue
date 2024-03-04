<script setup lang="ts">
import { User } from '@/types'
import { Link, useForm } from '@inertiajs/vue3'
import { onMounted } from 'vue'

const props = defineProps<{
  user: User
}>()

const form = useForm({
  email: '',
  name: '',
  password: '',
  password_confirmation: ''
})

onMounted(() => {
  form.email = props.user.email
  form.name = props.user.name
})
</script>

<template>
  <div class="w-1/3 mx-auto">
    <div class="mb-4">
      <AppButton
        :as="Link"
        :href="route('users.account')"
        label="Voltar"
        class="btn-primary btn-outline"
        icon="fas fa-arrow-left"
      />
    </div>

    <AppCard>
      <template #title>Editar conta</template>
      <template #body>
        <AppForm
          :form="form"
          method="patch"
          :endpoint="route('users.update')"
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
            autofocus
            placeholder="Digite o e-mail..."
            :error-message="form.errors.email"
          />

          <AppInput
            v-model="form.password"
            name="password"
            :label="'Nova senha'"
            placeholder="Digite a senha..."
            type="password"
            :hint="'Apenas preencha caso queira alterar a senha'"
            :error-message="form.errors.password"
          />

          <AppInput
            v-model="form.password_confirmation"
            name="password_confirmation"
            label="Confirme a senha"
            type="password"
            placeholder="Confirme a senha..."
          />

          <AppButton
            type="submit"
            class="w-full btn-success btn-outline"
            label="Atualizar"
          />
        </AppForm>
      </template>
    </AppCard>
  </div>
</template>
