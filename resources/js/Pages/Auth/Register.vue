<script setup>

import { Head, Link, useForm } from '@inertiajs/vue3';

//initialize reactive form for the registration
const form = useForm({
    firstname: '',
    surname: '',
    email: '',
    password: '',
});

//submit the form containing the data for registering a new user
const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
        <!-- register/sign up section -->
<div class="h-screen w-screen flex justify-center items-center">
        
  <form @submit.prevent="submit">
        <p class="mb-8 text-2xl font-extrabold flex justify-center">
            Sign up with Email
        </p>
        <!-- register/sign up fields -->
    <div class="flex gap-4 mb-4">

      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.firstname" id="firstname" type="text" placeholder="Firstname">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.surname" id="surname" type="text" placeholder="Surname">

    </div>
    <div class="mb-6">

      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.email" id="email" type="text" placeholder="Email Address">

    </div>
    <div class="mb-12">

      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.password" id="password" type="password" placeholder="Password">

    </div>
        <!-- register/sign up buttons -->
    <div class="mb-4 flex justify-center items-center">

      <button class=" w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none" type="submit">
        Create Account
      </button>

    </div>

    <p class="mb-8 text-sm font-small flex justify-center">
            By signing up, you agree to our Terms & Conditions.
        </p>
        <p class=" text-sm font-small flex justify-center">
            Have an account already? <a href="login" class="ml-1">Log in</a>
        </p>

  </form>
</div>

</template>
