import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Bootstrap from './bootstrap/bootstrap'
import BootstrapPage from './bootstrap/bootstrap-page'

createInertiaApp({
  title: BootstrapPage.defineTitle,
  resolve: BootstrapPage.resolveComponent,
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
    const bootstrap = new Bootstrap(app)

    // prettier-ignore
    bootstrap
      .addZiggy()
      .addPinia()
      .addVueQuery()
      .addRouteNavigationListener()
      .addInertiaPlugin(plugin)
      .addGlobalComponents()
      .mount(el)
  },
  progress: {
    color: '#4B5563'
  }
})
