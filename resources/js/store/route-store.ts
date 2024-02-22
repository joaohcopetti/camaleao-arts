import { defineStore } from 'pinia'
import { ref } from 'vue'
import ziggyRoute from '../../../vendor/tightenco/ziggy/src/js'

export const useRouteStore = defineStore('route', () => {
  const route = ref(ziggyRoute())

  const updateRoute = () => {
    route.value = ziggyRoute()
  }

  const isCurrent = (name: string, params?: any) => {
    return route.value.current(name, params)
  }

  return { route, updateRoute, isCurrent }
})
