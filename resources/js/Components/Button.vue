<script setup>
import { computed } from 'vue'
const props = defineProps({
  color: String,
})

const commonClass = 'rounded-lg px-5 py-2.5'

const colorClass = computed(() => {
  switch (props.color) {
    case 'primary':
      return 'bg-blue-700 hover:bg-blue-800 text-white'
    case 'secondary':
      return 'bg-white hover:bg-gray-100 text-black hover:text-blue-700'
    case 'success':
      return 'bg-green-600 hover:bg-green-700 text-white'
    case 'error':
      return 'bg-red-600 hover:bg-red-700 text-white'
    default:
      return 'bg-blue-700 hover:bg-blue-800 text-white'
  }
})
</script>

<template>
  <button :class="`${commonClass} ${colorClass}`"><slot /></button>
</template>
