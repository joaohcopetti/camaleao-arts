<script setup lang="ts">
import { Art } from '@/types'
import { DateTime } from 'luxon'
import { Link } from '@inertiajs/vue3'
type ArtCardProps = {
  art: Art
}

defineProps<ArtCardProps>()
</script>

<template>
  <div class="shadow-lg rounded-md w-full bg-base-200 overflow-hidden">
    <div>
      <img
        class="w-full select-none"
        :src="art.image_url"
        alt="Imagem da arte"
      />
    </div>
    <div class="p-3 flex flex-col gap-3">
      <span class="font-bold">{{ art.name }}</span>
      <Link
        :href="route('categories.show', { category: art.category?.slug })"
        class="badge badge-sm badge-primary"
      >
        {{ art.category?.name }}</Link
      >
      <span class="text-sm">
        {{
          DateTime.fromISO(art.created_at).toLocaleString({
            month: 'short',
            day: '2-digit'
          })
        }}
      </span>
    </div>
    <div class="flex">
      <AppButton
        :href="art.file_download_url"
        as="a"
        icon="fas fa-download"
        label="Projeto"
        class="w-1/2 rounded-none text-success"
      />
      <AppButton
        :href="art.image_download_url"
        as="a"
        icon="fas fa-download"
        label="Imagem"
        class="w-1/2 rounded-none text-primary"
      />
    </div>
  </div>
</template>
