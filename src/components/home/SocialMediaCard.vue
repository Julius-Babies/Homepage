<template>
<div class="card" :style="{'color': this.$props.color}">
    <div>
        <img :src="this.$props.icon_url">
        <div>{{ this.$props.name}}</div>
    </div>
</div>
</template>

<script>
export default {
    name: "SocialMediaCard",
    props: ["name", "icon_url", "url", "color"],
    data() {
        return {
            color: this.$props.color
        }
    }
}
</script>

<style scoped>
.card * {
    color: white;
}
.card {
    display: flex;
    border-radius: 20px;
    width: 100%;
    max-width: 200px;
    text-align: center;
    height: 100px;
    align-items: center;
    justify-content: center;
    transition: .5s;
    backdrop-filter: blur(5px);
    background-color: rgba(0, 0, 0, 0.25);

    margin: 5px 20px 0;
}

.card:hover {
    background-color: v-bind(color);
    margin-bottom: 5px;
    margin-top: 0;
}

img {
    height: 50px;
    width: 50px;
    object-fit: contain;
    margin-bottom: 5px;
}
</style>