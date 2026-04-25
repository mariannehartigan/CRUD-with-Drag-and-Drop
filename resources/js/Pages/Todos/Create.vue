<template>
  <div class="pt-[5vh]">
    <form @submit.prevent="create">
      <input v-model="form.description" type="text" class="w-[26vw] mr-[2vw]" @input="form.clearErrors('description')" placeholder="Add a task" />
      <input v-model="form.completed" type="checkbox" />
      <button type="submit" class="pl-[1vw]">+</button> 
      <div class="error">{{ form.errors.description }}</div>    
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  description: "",
  completed: false,
})

const create = () => { 
  form.post('/todo', {
    onSuccess: () => form.reset()
  }
)}
</script>