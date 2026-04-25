<template>
  <div class="todos-container">
    <div v-for="todo in todos" :key="todo.id">
      <ReadUpdateDelete :todo="todo" />
    </div>
    <Create />
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import ReadUpdateDelete from './ReadUpdateDelete.vue'
import Create from './Create.vue'

const todos = computed(() => usePage().props.todos)
</script>