<template>
  <router-view></router-view>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;200&display=swap');
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
}

#content {
    margin-top: 200px;
}

</style>
<script setup>
import Header from "@/components/Header.vue";
</script>