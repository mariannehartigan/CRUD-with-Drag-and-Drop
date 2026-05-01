<template>
  <form @change="update">
    <div v-if="!hidden">
      <input v-model="form.description" class="w-[28vw]" />
      <input v-model="form.completed" type="checkbox" :true-value="1" :false-value="0" />
      <Link 
        :href="`/todo/${props.todo.id}`" 
        method="DELETE" 
        as="button" 
        class="pl-[1vw]"
        @click="hide"
      >
        <img style="width: 0.8vw" src="../../../../public/trashcan.png" />
      </Link>
    </div>
  </form>
</template>

<script setup>
import { ref } from 'vue'
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
  todo: Object
})

const hidden = ref(false)
const hide = () => {
  hidden.value = true
}

const form = useForm({
  description: props.todo.description,
  completed: props.todo.completed,
})

const update = () => {
  form.put(`/todo/${props.todo.id}`)
}
</script>