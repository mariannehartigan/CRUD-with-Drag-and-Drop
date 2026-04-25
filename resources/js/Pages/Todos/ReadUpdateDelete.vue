<template>
  <form @change="update">
    <input v-model="form.description" class="w-[28vw]" />
    <input v-model="form.completed" type="checkbox" :true-value="1" :false-value="0" />
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  todo: Object
})

const form = useForm({
  description: props.todo.description,
  completed: props.todo.completed,
})

const update = () => {
  form.put(`/todo/${props.todo.id}`)
}
</script>