<script setup lang="ts">
import { useUserStore } from '@/store/user-store'
import { router, Link } from '@inertiajs/vue3'
import { onMounted } from 'vue'

const userStore = useUserStore()

const userItems = [
  { label: 'Minha conta', as: Link, props: { href: '' }, icon: 'fas fa-user-circle' },
  {
    label: 'Sair',
    as: 'button',
    icon: 'fas fa-right-from-bracket',
    props: {
      onclick: () => {
        router.post(route('auth.destroy'))
      }
    }
  }
]

onMounted(() => {
  if (userStore.hasPermission('ACCESS_ADMIN_PANEL')) {
    userItems.unshift({
      label: 'Painel',
      as: Link,
      props: { href: route('dashboard.arts.index') },
      icon: 'fas fa-gauge'
    })
  }
})
</script>

<template>
  <AppDropdown
    trigger-class="btn btn-ghost  rounded-full"
    :items="userItems"
  >
    <template #trigger>
      Olá, {{ userStore.firstName }}
      <FWIcon
        icon="fas fa-user-circle"
        size="2x"
      />
    </template>
  </AppDropdown>
  <!-- <div class="dropdown dropdown-end">
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
  </div> -->
</template>
