export interface User {
  id: number
  name: string
  email: string
  expire_at: string
  created_at: string
  has_valid_subscription: boolean
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User
  }
  categories: Category[]
}

export type PaginationLinks = {
  first: string
  last: string
  next: string | null
  prev: string | null
}

export type Paginated<T> = {
  data: T[]
  links: PaginationLinks
  meta: PaginationMeta
}

export interface Category {
  id: string
  name: string
  slug: string
}

export interface Art {
  id: string
  name: string
  slug: string
  image_url: string
  image_download_url: string
  file_download_url: string
  category: Category
  created_at: string
  updated_at: string
}

export type PaginationLink = {
  active: boolean
  label: string
  url: string | null
}

export interface AppPaginationProps {
  pagination: PaginationLinks & PaginationMeta
}

type PaginationSimpleUrls = {
  first: string
  last: string
  next: string | null
  prev: string | null
}

export type PaginationMeta = {
  current_page: number
  from: number
  last_page: number
  links: PaginationLink[]
  path: string
  per_page: number
  to: number
  total: number
}

export type Pagination = {
  links: PaginationSimpleUrls
  meta: PaginationMeta
}
