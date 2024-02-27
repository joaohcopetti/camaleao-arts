<script setup lang="ts">
import { useUserStore } from '@/store/user-store'
import { router, Link } from '@inertiajs/vue3'
const userStore = useUserStore()

const onLogoutClick = () => {
  router.post(route('auth.destroy'))
}
</script>

<template>
  <div class="dropdown dropdown-end">
    <div
      tabindex="0"
      role="button"
      class="btn btn-ghost rounded-full"
    >
      <span>Olá, {{ userStore.firstName }}</span>
      <FWIcon
        icon="fas fa-user-circle"
        size="2x"
      />
    </div>
    <ul
      tabindex="0"
      class="menu dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-40"
    >
      <li>
        <a> Minha conta </a>
      </li>
      <li><Link :href="route('dashboard.arts.index')">Painel</Link></li>
      <li><span @click.prevent="onLogoutClick">Sair</span></li>
    </ul>
  </div>
</template>
