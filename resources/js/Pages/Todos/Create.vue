<template>
  <div class="pt-[5vh]">
    <form @submit.prevent="create">
      <input 
        v-model="form.description" 
        type="text" class="w-[26vw] mr-[2vw]" 
        @input="form.clearErrors('description')" 
        @focus="clearError('description')" 
        @blur="validateField('description', form)"
        placeholder="Add a task" 
      />
      <input v-model="form.completed" type="checkbox" />
      <button type="submit" class="pl-[1vw]">+</button> 
      <div class="error">{{ errors.description }}{{ form.errors.description }}</div>    
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { useFormValidation } from '../../composables/validation'

const form = useForm({
  description: "",
  completed: false,
})

const { errors, validateField, validateForm, clearError } = useFormValidation()

const create = () => {
  if (!validateForm(form, ['description'])) return
  form.post('/todo', {
    onSuccess: () => form.reset()
  }
)}
</script>