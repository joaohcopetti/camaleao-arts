<script setup lang="ts">
import ArtCard from '@/Pages/Art/partials/ArtCard.vue'
import type { Art } from '@/types'
import { Link, router } from '@inertiajs/vue3'
import { DateTime } from 'luxon'

const props = defineProps<{
  art: Art
}>()

const onDeleteClick = () => {
  router.delete(route('dashboard.arts.delete', { art: props.art.slug }))
}
</script>

<template>
  <div class="grid grid-cols-[1fr_3fr] relative">
    <div>
      <img
        class="rounded shadow"
        :src="art.image_url"
        alt=""
      />
    </div>

    <div class="flex flex-col justify-between mx-5">
      <div class="absolute top-0 right-0">
        <AppDropdown trigger-class="btn btn-sm btn-ghost rounded-full w-8 h-8">
          <template #trigger>
            <FWIcon icon="fas fa-ellipsis" />
          </template>
          <template #content>
            <AppButton
              label="Editar"
              class="w-full text-sm rounded-none bg-base-100 border-none"
              :as="Link"
              :href="route('dashboard.arts.edit', { art: art.slug })"
            />
            <AppDropdown
              trigger-class="rounded-none w-full"
              class="w-full rounded-lg"
            >
              <template #trigger>
                <AppButton
                  label="Excluir"
                  class="w-full text-sm rounded-none bg-base-100 border-none"
                />
              </template>
              <template #content>
                <div class="p-3">
                  <div class="font-bold text-center mb-4">Tem certeza?</div>
                  <div>
                    <AppButton
                      label="Confirmar"
                      class="btn-sm btn-success w-full"
                      @click.prevent="onDeleteClick"
                    />
                  </div>
                </div>
              </template>
            </AppDropdown>
          </template>
        </AppDropdown>
      </div>

      <div class="flex flex-col gap-2">
        <div class="text-xl font-bold">{{ art.name }}</div>

        <div>
          <span class="badge badge-primary badge-sm"> {{ art.category?.name }}</span>
        </div>

        <div class="text-sm">
          <span> Cadastro em: {{ DateTime.fromISO(art.created_at).toFormat('dd/MM/y') }} </span>
        </div>
      </div>

      <div class="flex gap-4">
        <AppButton
          as="a"
          :href="art.file_download_url"
          label="Projeto"
          class="btn-sm"
          icon="fas fa-download"
        />
        <AppButton
          as="a"
          :href="art.image_download_url"
          label="Imagem"
          class="btn-sm"
          icon="fas fa-download"
        />
      </div>
    </div>
  </div>
</template>
