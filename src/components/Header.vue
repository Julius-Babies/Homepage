<template>
    <div id="menu" ref="menu">
        <router-link :to="{name: 'home'}">Home</router-link>&nbsp;&#x2022;&nbsp;
        <router-link :to="{name: 'intern'}">Intern</router-link>&nbsp;&#x2022;&nbsp;
        <a href="https://julius.familie-babies.de/wordpress">Blog</a>
    </div>
</template>

<script>
import {watch} from "vue";

export default {
    name: "Header",
    mounted() {
        window.addEventListener("scroll", this.handleScroll.bind(this));
        watch(() => this.has_background, () => {
            if (this.has_background) document.getElementById("menu").classList.add("menu_gradient");
            else document.getElementById("menu").classList.remove("menu_gradient");
        });
    },
    data() {
        return {
            has_background: false
        }
    },
    methods: {
        handleScroll() {
            if (this.$route.name === "home") {
                if (window.scrollY < window.innerHeight) {
                    this.has_background = false
                } else {
                    this.has_background = true
                }
            } else {
                if (window.scrollY < 50) {
                    this.has_background = false
                } else {
                    this.has_background = true
                }
            }
        }
    },
    beforeUnmount() {
        window.removeEventListener("scroll", this.handleScroll);
    }
}
</script>

<style scoped>
#menu {
    padding: 10px;
    position: fixed;
    width: 100vw;
    top: 0;
    font-family: 'Roboto', sans-serif;
    font-size: 200%;
    transition: .5s;
    background: rgba(0, 0, 0, 0.0);
}

.menu_gradient {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 90%, rgba(0, 0, 0, 0) 100%) !important;
}

#menu a {
    color: inherit;
    display: inline-block;
    padding: 0 5px;
    text-decoration: none;
}

#menu a:after {
    background-color: inherit;
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