<script setup lang="ts">
import type { User } from '@/types'
import { Link, router } from '@inertiajs/vue3'
import { DateTime } from 'luxon'
const props = defineProps<{
  user: User
}>()

const userInfo = [
  { label: 'E-mail', value: props.user.email },
  { label: 'Nome', value: props.user.name },
  { label: 'Senha', value: '*****' },
  {
    label: 'Assinatura expira em: ',
    value: DateTime.fromISO(props.user.expire_at).toFormat('dd/MM/y')
  }
]

const onDeleteBtnClick = () => {
  router.delete(route('users.destroy'))
}
</script>

<template>
  <div class="w-1/3 mx-auto">
    <AppCard>
      <template #title> Minha conta </template>
      <template #body>
        <div
          v-for="info in userInfo"
          :key="info.label"
          class="flex justify-between mb-3"
        >
          <div class="font-bold">
            {{ info.label }}
          </div>
          <div>
            {{ info.value }}
          </div>
        </div>

        <div class="flex justify-between mt-10">
          <AppButton
            :as="Link"
            :href="route('users.edit')"
            label="Editar dados"
            class="btn-primary btn-outline"
            icon="fas fa-edit"
          />
          <AppDropdown trigger-class="btn btn-error btn-outline">
            <template #trigger> Excluir conta </template>

            <template #content>
              <div class="p-3">
                <div class="font-bold text-center mb-4">Tem certeza?</div>
                <div>
                  <AppButton
                    label="Confirmar"
                    class="btn-sm btn-success w-full"
                    @click.prevent="onDeleteBtnClick"
                  />
                </div>
              </div>
            </template>
          </AppDropdown>
        </div>

        <div
          v-if="!user.has_valid_subscription"
          class="text-center text-error mt-10 mb-5"
        >
          Sua assinatura expirou. Entre em contato para renova-la.
        </div>
      </template>
    </AppCard>
  </div>
</template>
