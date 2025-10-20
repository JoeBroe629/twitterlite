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

//initialized a reactive form for the email and password used for logging in
const form = useForm({
    email: '',
    password: '',
});

//function for submitting the form containing data to login route > auth 
const submit = () => {
    //console.log(form.email, form.password),
    form.post(route('login'), {
        onSuccess: () => {
            window.location = route('dashboard');
        },
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
        <!-- login section -->
<div class="flex-grow: 3 h-screen w-screen flex justify-center items-center">
        
  <form @submit.prevent="submit" class="">
        <p class="font-body text-2xl font-bold flex justify-center">
            Welcome to MiniTweet
        </p>
        <p class="font-body text-l mb-4   flex justify-center">
            Connect with friends in 20 characters or less
        </p>
    <div class="flex gap-4 mb-4">
        <!-- login input fields -->
      <input class="font-body bg-gray-200 appearance-none border-none rounded-xl w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.email" id="email" type="text" placeholder="Email or Username"> 
      </input>
    </div>
    <div class="mb-10">
      <input class="font-body bg-gray-200 appearance-none border-none rounded-xl w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
      v-model="form.password" id="password" type="password" placeholder="Password">
      </input>
    </div>
        <!-- login and create account button -->
    <div class="mb-4  justify-center items-center">
         <button class="font-body mb-3 w-full rounded-xl bg-[#121419] px-3 py-2 text-white focus:bg-gray-600 focus:shadow-outline" type="submit">
        Log in
        </button>
      <button class="font-body w-full rounded-xl px-3 py-2 outline-3 outline-offset-2 border rounded-xl" type="button">
        <a href="register">Create Account</a>
      </button>
    </div>

  </form>
</div>

</template>
