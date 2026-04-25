<template>
  <div class="todos-container">
    <div v-for="todo in todos" :key="todo.id">
      <span class="w-[28vw]" :style="{display: 'inline-block'}">{{ todo.description }}</span>
      <span v-if="todo.completed">✓</span>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const todos = computed(() => usePage().props.todos)
</script>