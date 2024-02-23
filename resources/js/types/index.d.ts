export interface User {
  id: number
  name: string
  email: string
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User
  }
}

export type PaginationLink = {
  active: boolean
  label: string
  url: string | null
}

export type Paginated<T> = {
  data: T[]
  links: PaginationLink[]
  current_page: number
  first_page_url: string
  from: number
  last_page: number
  last_page_url: string
  next_page_url: string | null
  path: string
  per_page: number
  prev_page_url: string | null
  to: number
  total: number
}

export interface Category {
  id: string
  name: string
}

export interface Art {
  id: string
  name: string
  image_filepath: string
  image_download_url: string
  filepath_download_url: string
  category: Category
  created_at: string
  updated_at: string
}
