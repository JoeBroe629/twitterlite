<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    console.log(form.email, form.password),
    form.post(route('login'), {
        onSuccess: () => {
            window.location = route('dashboard'); // manually navigate after successful login
        },
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
        <!-- login section -->
    <div class="h-screen w-screen flex justify-center items-center">
        
  <form @submit.prevent="submit" class="">
        <p class="mb-2 text-2xl font-extrabold flex justify-center">
            Welcome to MiniTweet
        </p>
        <p class="mb-4  flex justify-center">
            Connect with friends in 20 characters or less
        </p>
    <div class="flex gap-4 mb-4">
        <!-- login input fields -->
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.email" id="email" type="text" placeholder="Email or Username"> 
      </input>
    </div>
    <div class="mb-12">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.password" id="password" type="password" placeholder="Password">
      </input>
    </div>
        <!-- login and create account button -->
    <div class="mb-4  justify-center items-center">
         <button class="mb-2 w-full rounded-xl bg-black px-3 py-2 text-white focus:bg-gray-600 focus:shadow-outline" type="submit">
        Login
        </button>
      <button class=" w-full rounded-md px-3 py-2 outline-2 outline-offset-2 border rounded-2xl" type="button">
        <a href="register">Create Account</a>
      </button>
    </div>

  </form>
</div>

</template>
