import { usePage } from '@inertiajs/vue3'
import { defineStore } from 'pinia'
import { computed } from 'vue'

export const useUserStore = defineStore('user', () => {
  const page = computed(() => usePage())
  const user = computed(() => page.value.props.auth.user)

  const isAuth = computed(() => !!user.value)
  const firstName = computed(() => user.value?.name.split(' ')[0])

  const hasPermission = (permission: string) => {
    if (!user.value?.permissions) {
      return false
    }

    return user.value?.permissions.includes(permission)
  }

  return { user, isAuth, firstName, hasPermission }
})
