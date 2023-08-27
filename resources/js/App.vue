<template>
    <!-- <div id="nav">
        <router-link to="/">Home</router-link> |
        <router-link to="/about">About</router-link>
    </div> -->
    <Header :NavAppName="AppName" />
    <router-view />
  </template>
<script>
  import Header from './component/Header.vue';

  export default{
    data(){
        return {
            AppName:'StockifyTrade'
        }
    },
    components:{
        Header
    }

  }

</script>