<template>
  <router-view></router-view>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;200&display=swap');
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
}

.content-gradient {
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8));
    height: 200px;
}
.content {
    padding: 10px;
    margin-top: 200px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
}

</style>
<script setup>
import Header from "@/components/Header.vue";
</script>