<template>
    <Header color="white"></Header>
    <div class="header" id="header">
        <div id="image"></div>
        <div id="welcome_typing"></div>
    </div>
</template>

<script>
// @ is an alias to /src
import Header from "@/components/Header.vue";

export default {
    name: 'HomeView',
    components: {Header},
    data() {
        return {
            is_active: true
        }
    },
    methods: {
        sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        },
        async animation() {
            let lastRandomText = ""
            while (this.$route.name === "home") {
                const text = ["Hallo.", "Herzlich willkommen.", "Internal server error (500)", "Julius Vincent Babies.", "Hier könnte ihre Werbung stehen."]
                let randomText = "";
                while (randomText === "" || randomText === lastRandomText) {
                    randomText = text[Math.floor(Math.random() * text.length)]
                }
                document.getElementById("welcome_typing").classList.add("typing");
                for (let i = 0; i < randomText.length; i++) {
                    // wait a random amount of time
                    if (!this.is_active) return
                    await this.sleep((Math.random() / 2) * 100 + 100);
                    if (!this.is_active) return
                    document.getElementById("welcome_typing").innerHTML += randomText[i]
                }
                document.getElementById("welcome_typing").classList.remove("typing");
                await this.sleep(3000)
                for (let i = 0; i < randomText.length; i++) {
                    if (!this.is_active) return
                    await this.sleep(50)
                    if (!this.is_active) return
                    document.getElementById("welcome_typing").innerHTML = document.getElementById("welcome_typing").innerHTML.slice(0, -1)
                }
                lastRandomText = randomText
            }
            document.getElementById("welcome_typing").innerText = ""
        }
    },
    mounted() {
        this.animation()
    },
    beforeUnmount() {
        this.is_active = false
    }
}

</script>

<style>

.info {
    border: 1pt solid orange;
}

#header {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 100vw;
    min-height: 500px;
}

#image {
    display: inline;
    position: absolute;
    top: 0;
    left: 0;
    transition: .5s;
    width: 100%;
    height: 100%;
    z-index: -1;
    background-size: 125%;
    background-image: url("~@/assets/header.jpg");
    background-repeat: no-repeat;
    background-position: center;
    filter: brightness(0.7);

}

#welcome_typing {
    color: white;
    font-family: 'Roboto', sans-serif;
    font-size: 400%;
    border-right: 0;
    padding-right: 0.05em;
    animation: typing 1s infinite;
}

@keyframes typing {
    0%, 49.999% {
        border-right: 0;
        padding-right: 0.05em;
    }
    50%, 100% {
        border-right: 0.05em solid white;
        padding-right: 0;
    }
}

</style>