<template>
  <div class="todos-container">
    <Draggable 
      v-model="draggableTodos" 
      item-key="id"
      animation = "200"
      @end = "onDragEnd"
      >
      <template #item="{ element }">
        <ReadUpdateDelete :todo="element" />
      </template>
    </Draggable>
    <Create />
  </div>
</template>

<script setup>
import { computed, ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import Draggable from 'vuedraggable'
import ReadUpdateDelete from './ReadUpdateDelete.vue'
import Create from './Create.vue'

const draggableTodos = ref(
  [...usePage().props.todos].sort((a, b) => a.position - b.position)
)

function onDragEnd() {
  const reordered = draggableTodos.value.map((item, index) => ({
    id: item.id, position: index
  }))
  router.put('/reordertodos', { todos: reordered })
}
</script>