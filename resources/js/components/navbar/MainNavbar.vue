<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import NavbarItems from './NavbarItems.vue'
import NavbarUserItems from './NavbarUserItems.vue'
import MainSidebar from './MainSidebar.vue'
import { useUserStore } from '@/store/user-store'
import { ref } from 'vue'

const userStore = useUserStore()
const sidebar = ref(false)
</script>

<template>
  <div class="navbar bg-base-100">
    <div class="navbar-start">
      <MainSidebar
        v-if="sidebar"
        @item-clicked="sidebar = false"
      />
      <AppButton
        icon="fas fa-bars"
        class="btn-ghost md:hidden"
        @click.prevent="sidebar = true"
      />
      <Link
        class="btn btn-ghost text-xl"
        :href="route('home')"
      >
        Corel Ultimate
      </Link>
    </div>
    <div
      v-if="userStore.hasPermission('ACCESS_ARTS')"
      class="navbar-center hidden md:flex"
    >
      <NavbarItems />
    </div>
    <div class="navbar-end">
      <NavbarUserItems v-if="userStore.isAuth" />
      <AppButton
        v-else
        :as="Link"
        :href="route('auth.create')"
        class="btn-ghost rounded-full"
        label="Entrar "
      />
    </div>
  </div>
</template>
