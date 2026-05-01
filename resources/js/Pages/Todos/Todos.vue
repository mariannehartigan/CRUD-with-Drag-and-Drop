<template>
  <div class="todos-container">
    <div v-for="category in categoriesWithTodos">
      <h3 class="text-purple-800 font-bold pt-[2vh] pb-[0.5vh]">{{ category.day }}</h3>
      <Draggable 
        v-model="category.todos" 
        item-key="id"
        :group="{ name: 'todos' }"
        animation = "200"
        class="pl-[1.5vw]"
        @end = "onDragEnd"
        >
        <template #item="{ element }">
          <ReadUpdateDelete :todo="element" />
        </template>
      </Draggable>
      <br />
    </div>
    <Create />
  </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import Draggable from 'vuedraggable'
import ReadUpdateDelete from './ReadUpdateDelete.vue'
import Create from './Create.vue'

const categoriesWithTodos = ref(usePage().props.categoriesWithTodos.map(category => ({ ...category, todos: [...category.todos] })) )

watch(
  () => usePage().props.categoriesWithTodos,
  (val) => {
    categoriesWithTodos.value = val.map(c => ({ ...c }))
  }
)

function onDragEnd() {
  const newTodoData = []
  categoriesWithTodos.value.forEach(category => {
    category.todos.forEach((todo, index) => {
      newTodoData.push({
        id: todo.id,
        position: index,
        category_id: category.id
      })
    })
  })
  router.put('/reordertodos', { todos: newTodoData })
}
</script>