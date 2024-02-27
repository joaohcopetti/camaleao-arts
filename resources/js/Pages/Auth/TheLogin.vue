<script setup lang="ts">
import LoginForm from './LoginForm.vue'
</script>

<template>
  <div class="flex justify-center mt-20">
    <div class="p-4 bg-base-100 w-3/12 rounded-lg shadow-lg">
      <div class="text-center my-5">
        <FWIcon
          icon="fas fa-user-circle"
          size="5x"
        />
      </div>

      <div class="text-center text-xl my-10">Entre com sua conta</div>

      <LoginForm />
    </div>
  </div>
</template>
