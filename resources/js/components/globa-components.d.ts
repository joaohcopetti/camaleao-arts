import AppInput from './app-input/AppInput.vue'
import AppButton from './AppButton.vue'
import AppForm from './AppForm.vue'
import AppCombobox from './combobox/AppCombobox.vue'

declare module '@vue/runtime-core' {
  export interface GlobalComponents {
    AppInput: typeof AppInput
    AppForm: typeof AppForm
    AppButton: typeof AppButton
    AppCombobox: typeof AppCombobox
  }
}
