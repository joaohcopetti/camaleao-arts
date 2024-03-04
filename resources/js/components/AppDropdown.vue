<script lang="ts" setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'

type AppDropdownItem = {
  label: string
  as: string
  icon?: string
  props: object
}

type AppDropdownProps = {
  items?: AppDropdownItem[]
  triggerClass?: any
  chevron?: boolean
}

withDefaults(defineProps<AppDropdownProps>(), {
  chevron: false,
  itemsAs: 'button',
  triggerClass: 'btn btn-ghost',
  items: undefined
})
</script>

<template>
  <div class="w-fit text-right relative">
    <Menu
      v-slot="{ open }"
      as="div"
      class="inline-block text-left"
    >
      <div>
        <MenuButton :class="triggerClass">
          <slot name="trigger" />
          <FWIcon
            v-if="chevron"
            icon="fas fa-chevron-down"
            class="transition-transform"
            :class="{
              'rotate-0': !open,
              'rotate-180': open
            }"
          />
        </MenuButton>
      </div>

      <Transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute right-0 mt-2 w-56 origin-top-right divide-y rounded-md bg-base-100 shadow-lg ring-1 ring-black/5 focus:outline-none z-10"
        >
          <template v-if="!items">
            <MenuItem as="div">
              <slot name="content" />
            </MenuItem>
          </template>
          <div
            v-else
            class="px-1 py-1"
          >
            <MenuItem
              v-for="item in items"
              v-slot="{ active, close }"
              :key="item.label"
            >
              <Component
                :is="item.as"
                v-bind="item.props"
                :class="[
                  active ? 'bg-base-200 text-white' : 'text-base-content',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm'
                ]"
                @click.capture="close"
              >
                <FWIcon
                  v-if="item.icon"
                  :icon="item.icon"
                  fixed-width
                  class="mr-2"
                />
                {{ item.label }}
              </Component>
            </MenuItem>
          </div>
        </MenuItems>
      </Transition>
    </Menu>
  </div>
</template>
