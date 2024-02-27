<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3'
import NavbarItems from './NavbarItems.vue'
import NavbarUserItems from './NavbarUserItems.vue'
import { computed } from 'vue'
import { useUserStore } from '@/store/user-store'

const userStore = useUserStore()
</script>

<template>
  <div class="navbar bg-base-100">
    <div class="navbar-start">
      <Link
        class="btn btn-ghost text-xl"
        :href="route('home')"
      >
        Corel Ultimate
      </Link>
    </div>
    <div
      v-if="userStore.hasPermission('ACCESS_ARTS')"
      class="navbar-center hidden lg:flex"
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
