import MainLayout from '@/layouts/MainLayout.vue'

import { DefineComponent } from 'vue'

export default class BootstrapPage {
  protected static APP_NAME = 'Camaleão Artes'

  protected static definePageLayout(page: DefineComponent) {
    page.default.layout = page.default.layout || MainLayout
  }

  protected static getRequestedPage(name: string) {
    const pages = import.meta.glob<DefineComponent>('../Pages/**/*.vue')

    return pages[`../Pages/${name}.vue`]()
  }

  public static async resolveComponent(name: string) {
    const page = await BootstrapPage.getRequestedPage(name)

    BootstrapPage.definePageLayout(page)

    return page
  }

  public static defineTitle(title: string) {
    return title ? `${title} | ${BootstrapPage.APP_NAME}` : BootstrapPage.APP_NAME
  }
}
