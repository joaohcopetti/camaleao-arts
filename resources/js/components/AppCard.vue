<template>
  <div class="rounded-lg shadow-lg bg-base-100 overflow-hidden">
    <div v-if="$slots['title']" class="bg-primary text-primary-content p-4 font-bold">
      <slot name="title" />
    </div>

    <div class="p-4">
      <slot name="body" />
    </div>
  </div>
</template>
