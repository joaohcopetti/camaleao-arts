import { type InertiaForm } from '@inertiajs/vue3'
import { type Method } from '@inertiajs/core'

export interface AppFormProps {
  method?: Method
  form: InertiaForm<object>
  endpoint: string
  transformedData?: () => object
  populateForm?: () => void
}
