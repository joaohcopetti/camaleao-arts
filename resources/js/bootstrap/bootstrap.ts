import { useRouteStore } from '@/store/route-store'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { router } from '@inertiajs/vue3'
import { VueQueryPlugin } from '@tanstack/vue-query'
import { App, Plugin } from 'vue'
import { ZiggyVue } from '../../../vendor/tightenco/ziggy/dist/vue.m'
import { createPinia } from 'pinia'

export default class Bootstrap {
  protected app: App

  constructor(app: App) {
    this.app = app
  }

  mount(el: Element) {
    this.app.mount(el)
  }

  addPinia() {
    const pinia = createPinia()

    this.app.use(pinia)

    return this
  }

  addInertiaPlugin(plugin: Plugin) {
    this.app.use(plugin)

    return this
  }

  addFontAwesome() {
    this.app.component('FWIcon', FontAwesomeIcon)

    return this
  }

  addZiggy() {
    this.app.use(ZiggyVue)

    return this
  }

  addVueQuery() {
    this.app.use(VueQueryPlugin)

    return this
  }

  addRouteNavigationListener() {
    const route = useRouteStore()

    router.on('navigate', () => {
      route.updateRoute()
    })

    return this
  }

  addGlobalComponents() {
    const components = import.meta.glob('../**/App*.vue', { eager: true })

    Object.entries(components).forEach(([path, definition]: [string, any]) => {
      const componentName = path
        .split('/')
        .pop()!
        .replace(/\.\w+$/, '')

      this.app.component(componentName, definition.default)
    })

    return this
  }
}
