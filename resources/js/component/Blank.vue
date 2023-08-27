<template>
    <div>
      <h1>{{ message }}</h1>
      <button @click="changeMessage">Change Message</button>
    </div>
  </template>
  
  <script>
  export default {
    name: 'MyComponent',
    data() {
      return {
        message: 'Hello, Vue!'
      };
    },
    computed: {
      reversedMessage() {
        return this.message.split('').reverse().join('');
      }
    },
    methods: {
      changeMessage() {
        this.message = 'New message!';
      }
    },
    watch: {
      message(newMessage, oldMessage) {
        console.log(`Message changed from ${oldMessage} to ${newMessage}`);
      }
    },
    created() {
      console.log('Component created');
    },
    mounted() {
      console.log('Component mounted');
    },
    updated() {
      console.log('Component updated');
    },
    beforeUnmount() {
      console.log('Component about to be unmounted');
    },
    unmounted() {
      console.log('Component unmounted');
    }
  };
  </script>
  
  <style scoped>
  h1 {
    color: blue;
  }
  </style>
<template>
    <div>
      <h1>{{ message }}</h1>
      <button @click="updateMessage">Update Message</button>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  
  export default {
    name: 'MyComponent',
    setup() {
      // Data
      const message = ref('Hello, Vue 3!');
  
      // Methods
      const updateMessage = () => {
        message.value = 'Updated message!';
      };
  
      // Lifecycle Hooks
      // Mounted hook
      const mounted = () => {
        console.log('Component has been mounted');
      };
  
      // BeforeUnmount hook
      const beforeUnmount = () => {
        console.log('Component is about to be unmounted');
      };
  
      return {
        message,
        updateMessage,
        mounted,
        beforeUnmount
      };
    }
  };
  </script>
  
  <style>
  /* Your component's styles here */
  </style>
    