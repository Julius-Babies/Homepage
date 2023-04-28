<template>
    <div id="menu">
        <router-link :to="{name: 'home'}">Home</router-link>&nbsp;&#x2022;&nbsp;
        <router-link :to="{name: 'intern'}">Intern</router-link>&nbsp;&#x2022;&nbsp;
        <a href="https://julius.familie-babies.de/wordpress">Blog</a>
    </div>
</template>

<script>
export default {
    name: "Header",
    props: ["color"]
}
</script>

<style scoped>
#menu {
    position: fixed;
    padding: 10px;
    font-family: 'Roboto', sans-serif;
    font-size: 200%;
    color: v-bind(color);
}

#menu a {
    color: v-bind(color);
    display: inline-block;
    padding: 0 5px;
    text-decoration: none;
}

#menu a:after {
    background-color: v-bind(color);;
    content: '';
    display: block;
    height: .1em;
    margin-left: calc(5px * -1);
    margin-top: .2em;
    transition: width .5s;
    width: 0;
}

#menu a:hover:after {
    width: calc(100% + 5px * 2);
}
</style>