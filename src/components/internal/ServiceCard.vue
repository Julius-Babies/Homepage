<template>
<a :href="this.$props.url" target="_blank">
    <div class="intern_service">
        <img :src="this.$props.icon_url" :alt="'Icon for ' + this.$props.name">
        <span>{{ this.$props.name }}</span>
    </div>
</a>
</template>

<script>
export default {
    name: "ServiceCard",
    props: ["name", "icon_url", "url"],
}
</script>

<style scoped>
a {
    text-decoration: none;
    color: inherit;
}
.intern_service {
    display: inline-block;
    margin: 5px 5pt 0;
    width: 200px;
    height: 250px;
    overflow: hidden;
    border: 1pt solid gray;
    border-radius: 10px;
    text-align: center;
    transition: .3s;
    cursor: pointer;
}

.intern_service:hover {
    background-color: #333333;
    margin-top: 0;
    margin-bottom: 5px;
}

img {
    width: 180px;
    height: 180px;
    object-fit: contain;
    padding: 10px;
}
</style>