<script setup>
import { computed } from 'vue'
const props = defineProps({
  color: String,
})

const commonClass = 'p-4 mb-4 rounded-lg'

const colorClass = computed(() => {
  switch (props.color) {
    case 'success':
      return 'bg-green-100 text-green-800'
    case 'error':
      return 'bg-red-100 text-red-800'
    default:
      return 'bg-green-100 text-green-800'
  }
})
</script>

<template>
  <div :class="`${commonClass} ${colorClass}`">
    <slot />
  </div>
</template>
