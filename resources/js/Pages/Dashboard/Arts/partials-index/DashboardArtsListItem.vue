<script setup lang="ts">
import type { Art } from '@/types'
import { DateTime } from 'luxon'

defineProps<{
  art: Art
}>()
</script>

<template>
  <div class="grid grid-cols-[1fr_3fr]">
    <div class="">
      <img
        class="rounded shadow"
        :src="art.image_url"
        alt=""
      />
    </div>

    <div class="flex flex-col justify-between mx-5">
      <div class="flex flex-col gap-2">
        <div class="text-xl font-bold">{{ art.name }}</div>

        <div>
          <span class="badge badge-primary badge-sm"> {{ art.category.name }}</span>
        </div>

        <div class="text-sm">
          <span> Cadastro em: {{ DateTime.fromISO(art.created_at).toLocaleString() }} </span>
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
