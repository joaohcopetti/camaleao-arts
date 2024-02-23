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
      <img class="rounded shadow" :src="art.image_filepath" alt="" />
    </div>
    <div class="flex flex-col justify-between mx-5">
      <div>
        <div class="text-xl font-bold">{{ art.name }}</div>
        <div class="text-sm">
          Cadastro em: {{ DateTime.fromISO(art.created_at).toLocaleString() }}
        </div>
      </div>
      <div class="flex gap-4">
        <AppButton
          as="a"
          :href="art.image_download_url"
          label="Imagem"
          class="btn-sm"
          icon="fas fa-download"
        />
        <AppButton
          as="a"
          :href="art.filepath_download_url"
          label="Projeto"
          class="btn-sm"
          icon="fas fa-download"
        />
      </div>
    </div>
  </div>
</template>
