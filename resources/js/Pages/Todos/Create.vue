<template>
  <div class="pt-[5vh]">
    <form @submit.prevent="create">
      <input 
        v-model="form.description" 
        type="text" 
        class="w-[27.5vw] mr-[2vw]" 
        @input="form.clearErrors('description')" 
        @focus="clearError('description')" 
        @blur="validateField('description', form)"
        placeholder="Add a task" 
      />
      <input v-model="form.completed" type="checkbox" />
      <button type="submit" class="pl-[1vw]">+</button> 
      <div class="pt-[0.25vh] pl-[1.5vw]">
        <label class="cursor-pointer pr-[0.6vw]">
          <input v-model="form.category_id" type="radio" name="category_id" value=1> Today
        </label>
        <label class="cursor-pointer pr-[0.6vw]">
          <input v-model="form.category_id" type="radio" name="category_id" value=2> Tomorrow
        </label>
        <label class="cursor-pointer">
          <input v-model="form.category_id" type="radio" name="category_id" value=3> Next Week  
        </label>          
      </div>
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
  category_id: 1,
})

const { errors, validateField, validateForm, clearError } = useFormValidation()

const create = () => {
  if (!validateForm(form, ['description'])) return
  form.post('/todo', {
    onSuccess: () => form.reset()
  }
)}
</script>