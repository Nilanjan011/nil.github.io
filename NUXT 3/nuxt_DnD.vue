<script setup>

import { onMounted, ref } from 'vue';

const posts = ref([
  { id: 1, title: 'Post 1' },
  { id: 2, title: 'Post 2' },
  { id: 3, title: 'Post 3' },
]);



onMounted(() => {

  // Wait for jQuery to be loaded
  const checkJQuery = setInterval(() => {
    if (window.jQuery) {
      clearInterval(checkJQuery);
      const $ = window.jQuery; // Access jQuery from the global window object

      $('#sortable').sortable({
        // placeholder: 'ui-state-highlight',
      });

      $('#sortable').disableSelection();
      console.log('jQuery loaded');

    }
  }, 100); // Check every 100ms
});

function appendItem() {
  posts.value.push({ id: posts.value.length + 1, title: 'New Post' });
}

function saveOrder() {
  let newPosts = [];
  // Get the sorted IDs from the DOM
  const sortedIDs =document.querySelectorAll('#sortable li');

  for (const key in sortedIDs) {
    let id = sortedIDs[key].getAttribute('data-id');
    newPosts.push({ id, title: sortedIDs[key].innerText });
  }

  // Replace the posts array with the sorted IDs
  posts.value = newPosts;
  
  // Update the posts array with the sorted IDs
  // posts.value = sortedIDs.map(id => ({ id, title: 'Post ' + id })); // Replace the posts array with the sorted IDs    
}

</script>
<template>
  <div>
    <h1>This is h1</h1>

    <ul id="sortable">
      <li v-for="post in posts" :key="post.id" :data-id="post.id">
        <input type="text" v-model="post.title" />
        {{ post.title }}
      </li>
    </ul>

    <button @click="appendItem">Add Item</button>
    <button @click="saveOrder">submit</button>

  </div>
</template>

<style>
body {
  background-color: #2c3e50;
  color: #f1f1f1;
}

li {
  padding: 10px;
  border: 1px solid #f1f1f1;
  margin: 15px;
}
</style>


<!-- 
// nuxt.config.ts file
// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  app: {
    head: {
      script: [
        {
          src: 'https://code.jquery.com/jquery-3.6.0.min.js'
        },
        {
          src: 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js',
        },
      ],
      link: [
        {
          rel: 'stylesheet',
          href: 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        },
      ],
    },

    
  }
 


}) -->
