export interface AppInputProps {
  name: string
  mask?: string
  type?: 'text' | 'password'
  accept?: string
  label?: string
  error?: boolean
  errorMessage?: string
  hint?: string
  inputClass?: string
  autofocus?: boolean
  placeholder?: string
  autocomplete?: string
  mask?: string | string[]
}
