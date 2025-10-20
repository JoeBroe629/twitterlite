<script setup>
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
 import { Head , useForm , router } from '@inertiajs/vue3';
 import { defineProps } from 'vue';

 const form = useForm({
  postcontent: '',
 }); 
 const logout=()=>{
  form.post(route('logout'));
 };

 const submitPost = () => {
  form.post(route('posts.store'), {
    onSuccess: () => {
      form.reset('postcontent');
    },
  });
};

const props = defineProps({
  posts: Array,
});

const toggleLike = async (post) => {
  try {
    const response = await axios.post(route('posts.like', post.id_post));
    post.likes_count = response.data.likes_count;
    post.liked_by_user = response.data.status === 'liked';
  } catch (error) {
    console.error(error);
  }
};

</script>

<template>
        <!-- Dashboard section -->
<body class="bg-gray-50 min-h-screen">
            <!-- Navbar/top section -->
  <nav class="bg-gray-50 text-black py-3 px-4 flex items-center justify-between">
    <a class="ml-16 font-bold text-2xl tracking-tight" href="#">MiniTweet</a>
            <!-- profile photo and logout button upper right -->
    <div class="flex items-center">
      <img class="mr-12 w-10 h-10 rounded-full transition-transform duration-300 hover:scale-110 object-cover"
           src="https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg"
           alt="Profile">
      <div class="mr-2 w-10 h-10 bg-[url('../image/logouticon.png')] bg-no-repeat bg-origin-border bg-contain bg-center"></div>
      <button @click="logout" class="mr-16 text-black">Logout</button>
    </div>
  </nav>    
            <!-- dashboard tweeting area -->
            <!-- profile photo -->
  <div class="flex justify-center py-12 px-4">
    <div class="flex items-start bg-white text-black p-4 rounded-2xl w-full max-w-xl shadow-lg">
      <img
        class="mr-4 ml-2 w-12 h-12 rounded-full object-cover transition-transform duration-300 hover:scale-110"
        src="https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg"
        alt="Profile">
      <div class="flex flex-col flex-1 mr-4">
    
            <!-- textarea, post button and characters remaining -->
        <form class="w-full" @submit.prevent="submitPost">
  <div class="flex flex-col w-full">
    <textarea
      class="w-full h-24 bg-gray-100 text-black placeholder-gray-400 p-3 rounded-xl resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
      v-model="form.postcontent"
      maxlength="280"
      placeholder="What's happening?"
    ></textarea>

    <div class="flex justify-between items-center mt-2">
      <p class="text-sm text-gray-500">
        {{ 280 - form.postcontent.length }} characters remaining
      </p>
      <button
       @click="toggleLike(post)"
        type="submit"
        :disabled="form.processing"
        class="rounded-md bg-black px-4 py-2 text-white font-semibold hover:bg-gray-700 focus:outline-none disabled:opacity-50"
      >
        Tweet
      </button>
    </div>
  </div>
</form>
      </div>
    </div>
  </div>

  <div class="flex flex-col items-center space-y-6 px-4">
      <div
        v-for="post in posts"
        :key="post.id_post"
        class="flex items-start bg-white text-black p-4 rounded-2xl w-full max-w-xl shadow-md"
      >
        <img
          class="mr-4 ml-2 w-12 h-12 rounded-full object-cover"
          src="https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg"
          alt="Profile"
        />
        <div class="flex flex-col flex-1">
          <div class="flex items-center space-x-2">
            <p class="font-bold">{{ post.user.firstname }} {{ post.user.lastname }}</p>
          </div>
          <p class="text-gray-800 mt-1 whitespace-pre-wrap">{{ post.postcontent }}</p>
          <div class="flex items-center mt-2 space-x-2">
          <button
           @click="toggleLike(post)"
            class="text-sm text-gray-500 mt-2">
            <span v-if="post.liked_by_user">❤️</span>
            <span v-else>🤍</span>
            <span>{{ post.likes_count }}</span>
          </button>
          </div>
        </div>
      </div>
    </div>
</body>

     <!-- <nav class="flex items-center justify-between bg-black"> 
        
        <div class=" flex px-4 py-2 flex items-center h-16">
            <div class="text-xl flex items-center font-bold text-blue-900">
               MiniTweet
               <div class="flex  bg-white space-x-2" >
                <img class="w-10 h-10 rounded-full transition-transform duration-300 hover:scale-110 object-cover" 
                     src="https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg" 
                     alt="Profile"> </img>
                     <div class=" w-10 h-10 bg-[url('../image/logouticon.png')] bg-no-repeat bg-origin-border bg-contain bg-center">
                        </div>
                     
            </div>
            
            </div>
            <button class="flex text-white mr-auto">
                        Logout
                     </button>
                     
            
            
        </div>
    </nav> -->

    <!-- <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template> -->

        <!-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div> -->
    <!-- </AuthenticatedLayout> -->
</template>
