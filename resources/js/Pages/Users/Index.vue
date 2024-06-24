<script setup>
import { router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import Button from '@/Components/Button.vue'
import Alert from '@/Components/Alert.vue'

const props = defineProps({
  users: Array,
  successMessage: String,
  errorMessage: String,
  success_message: String,
  error_message: String,
})

const add = () => {
  router.get(route('users.create'))
}
const edit = id => {
  router.get(route('users.edit', { id }))
}

const destroy = id => {
  if (confirm('Are you sure you want to delete this?')) {
    router.delete(route('users.destroy', { id }))
  }
}
</script>

<template>
  <AuthenticatedLayout>
    <div class="container mx-auto p-5 my-5 bg-white rounded-lg">
      <Alert v-if="success_message" color="success">{{ success_message }}</Alert>
      <Alert v-if="error_message" color="error">{{ error_message }}</Alert>
      <Button @click="add()" color="primary">Add User</Button>
      <div class="overflow-x-auto mt-5">
        <table class="w-full text-left">
          <thead class="bg-blue-300">
            <tr>
              <th class="px-6 py-4">ID</th>
              <th class="px-6 py-4">NAME</th>
              <th class="px-6 py-4">E-MAIL</th>
              <th class="px-6 py-4">ACTION</th>
            </tr>
          </thead>
          <tbody class="bg-blue-50">
            <tr v-for="user in users" :key="user.id" class="border-b">
              <td class="px-6 py-4">{{ user.id }}</td>
              <td class="px-6 py-4">{{ user.name }}</td>
              <td class="px-6 py-4">{{ user.email }}</td>
              <td class="px-6 py-4">
                <div class="flex gap-2">
                  <Button @click="edit(user.id)" color="success">Edit</Button>
                  <Button @click="destroy(user.id)" color="error">Delete</Button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style></style>
