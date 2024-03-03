<script setup lang="ts">
import type { User } from '@/types'
import SubscribersListItem from './SubscribersListItem.vue'
defineProps<{
  users: User[]
}>()
</script>

<template>
  <ul>
    <SubscribersListItem
      v-for="user in users"
      :key="user.id"
      :user="user"
    />
  </ul>
</template>
