<template>
    <div id="image"></div>
    <Header></Header>
  <router-view></router-view>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;200&display=swap');
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #000000;
    color: #ffffff;
}

#content {
    margin-top: 80px;
}

#image {
    display: inline;
    position: fixed;
    top: 0;
    left: 0;
    transition: .5s;
    min-width: 100%;
    min-height: 100%;
    z-index: -1;
    filter: brightness(0.2);

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-image: url("~@/assets/header.jpg");

}

</style>
<script setup>
import Header from "@/components/Header.vue";
</script>
