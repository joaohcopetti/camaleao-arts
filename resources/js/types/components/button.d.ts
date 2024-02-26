import { InertiaLinkProps } from '@inertiajs/vue3'

export interface AppButtonProps {
  as?: string | DefineComponent<InertiaLinkProps>
  label?: string
  icon?: string
  loading?: boolean
}
