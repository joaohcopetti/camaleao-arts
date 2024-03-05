<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import type { AppPaginationProps } from '@/types'

const { pagination } = defineProps<AppPaginationProps>()

const links = computed(() => {
  const links = pagination.links

  links.pop()
  links.shift()

  return links
})

const hasPages = computed(() => pagination.total > pagination.per_page)
</script>

<template>
  <div v-if="hasPages">
    <div class="join">
      <Link
        aria-label="Página anterior"
        as="button"
        :href="pagination.prev || ''"
        class="btn join-item w-20"
        :disabled="pagination.prev === null"
      >
        <FWIcon icon="fas fa-circle-left" />
      </Link>

      <Link
        v-for="link in links"
        :key="link.label"
        as="button"
        :href="link.url || ''"
        class="btn join-item hidden lg:block"
        :disabled="link.url === null"
        :class="{
          'btn-primary': link.active
        }"
      >
        {{ link.label }}
      </Link>

      <Link
        aria-label="Próxima página"
        as="button"
        :href="pagination.next || ''"
        class="btn join-item w-20"
        :disabled="pagination.next === null"
      >
        <FWIcon icon="fas fa-circle-right" />
      </Link>
    </div>

    <div class="lg:hidden text-sm mt-2">
      Página <b>{{ pagination.current_page }}</b> de
      <b>{{ pagination.last_page }}</b>
    </div>
  </div>
</template>
