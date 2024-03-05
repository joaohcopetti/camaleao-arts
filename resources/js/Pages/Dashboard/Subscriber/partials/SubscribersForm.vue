<script setup lang="ts">
import { User } from '@/types'
import { useForm } from '@inertiajs/vue3'
import { onMounted, computed } from 'vue'
import { DateTime } from 'luxon'

const props = defineProps<{
  user?: User
}>()

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  expire_at: DateTime.now().plus({ year: 1 }).toFormat('dd/MM/y')
})

const isEdit = computed(() => !!props.user)

const endpoint = computed(() =>
  isEdit.value
    ? route('dashboard.subscribers.update', { user: props.user })
    : route('dashboard.subscribers.store')
)

const populateForm = () => {
  if (!props.user) {
    return
  }

  form.name = props.user.name
  form.email = props.user.email
  form.expire_at = DateTime.fromISO(props.user.expire_at).toFormat('dd/MM/y')
}

const transformedData = () => {
  return {
    ...form.data(),
    expire_at: DateTime.fromFormat(form.expire_at, 'dd/MM/y').toISODate()
  }
}

onMounted(() => {
  if (isEdit.value) {
    populateForm()
  }
})
</script>

<template>
  <AppForm
    :form="form"
    :endpoint="endpoint"
    :method="isEdit ? 'patch' : 'post'"
    :transformed-data="transformedData"
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
      :label="isEdit ? 'Nova senha' : 'Senha'"
      placeholder="Digite a senha..."
      type="password"
      :hint="isEdit ? 'Apenas preencha caso queira alterar a senha' : undefined"
      :error-message="form.errors.password"
    />

    <AppInput
      v-model="form.password_confirmation"
      name="password_confirmation"
      label="Confirme a senha"
      type="password"
      placeholder="Confirme a senha..."
    />

    <AppInput
      v-model="form.expire_at"
      name="expire_at"
      label="Expiração da assinatura"
      placeholder="dd/mm/aaaa"
      mask="##/##/####"
      :error-message="form.errors.expire_at"
    />

    <div class="mt-4">
      <AppButton
        type="submit"
        :label="isEdit ? 'Atualizar' : 'Cadastrar'"
        class="btn-success btn-block btn-outline"
      />
    </div>
  </AppForm>
</template>
