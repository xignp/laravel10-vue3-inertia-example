<script setup>
import { router, useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import Button from '@/Components/Button.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'

const props = defineProps({
  user: Object,
})

const form = useForm({
  name: props.user.name,
  email: props.user.email,
})

const update = () => {
  form.put(route('users.update', { id: props.user.id }))
}
</script>

<template>
  <AuthenticatedLayout>
    <div class="container mx-auto p-5 my-5 bg-white rounded-lg">
      <div class="max-w-sm mx-auto">
        <form @submit.prevent="update()">
          <div>
            <InputLabel for="name" value="Name" />
            <TextInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
              required
              autofocus
              autocomplete="name"
            />
            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="mt-5">
            <InputLabel for="email" value="Email" />
            <TextInput
              id="email"
              type="email"
              class="mt-1 block w-full"
              v-model="form.email"
              required
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <Button
            type="submit"
            color="primary"
            :class="{ 'opacity-25': form.processing, 'mt-5': true }"
            :disabled="form.processing"
          >
            Update
          </Button>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style></style>
