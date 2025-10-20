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
        <p class="mb-8 font-body text-2xl font-bold flex justify-center">
            Sign up with Email
        </p>
        <!-- register/sign up fields -->
    <div class="flex gap-4 mb-5">

      <input class="font-body appearance-none border-none rounded-xl w-full py-4 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.firstname" id="firstname" type="text" placeholder="Firstname">
      <input class="font-body appearance-none border-none rounded-xl w-full py-4 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.surname" id="surname" type="text" placeholder="Surname">

    </div>
    <div class="mb-5">

      <input class="font-body  appearance-none border-none rounded-xl w-full py-4 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.email" id="email" type="text" placeholder="Email Address">

    </div>
    <div class="mb-12">

      <input class="font-body  appearance-none border-none rounded-xl w-full py-4 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.password" id="password" type="password" placeholder="Password">

    </div>
        <!-- register/sign up buttons -->
    <div class="font-body mb-4 flex justify-center items-center">

      <button class="font-body w-full rounded-xl bg-black px-3 py-4 text-white focus:bg-gray-600  focus:outline-none" type="submit">
        Create Account
      </button>

    </div>

    <p class="font-body mb-8 text-gray-600 text-sm font-small flex justify-center">
            By signing up, you agree to our Terms & Conditions.
        </p>
        <p class="font-body text-gray-600 text-sm font-small flex justify-center">
            Have an account already? <a href="login" class="ml-1 text-black">Log in</a>
        </p>

  </form>
</div>

</template>
