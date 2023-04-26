<template>
    <Header color="white"></Header>
    <div class="header" id="header">
        <div id="image"></div>
        <div id="welcome_typing"><span></span><span id="welcome_cursor">|</span></div>
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
            const textSpan = document.getElementById("welcome_typing").getElementsByTagName("span")[0]
            let lastRandomText = ""
            while (this.$route.name === "home") {
                const text = ["Hallo.", "Herzlich willkommen.", "Internal server error (500)", "Julius Vincent Babies.", "Hier könnte ihre Werbung stehen."]
                let randomText = "";
                while (randomText === "" || randomText === lastRandomText) {
                    randomText = text[Math.floor(Math.random() * text.length)]
                }
                for (let i = 0; i < randomText.length; i++) {
                    // wait a random amount of time
                    if (!this.is_active) return
                    await this.sleep((Math.random() / 2) * 100 + 100);
                    if (!this.is_active) return
                    textSpan.innerHTML += randomText[i]
                }
                await this.sleep(3000)
                for (let i = 0; i < randomText.length; i++) {
                    if (!this.is_active) return
                    await this.sleep(50)
                    if (!this.is_active) return
                    textSpan.innerHTML = textSpan.innerHTML.slice(0, -1)
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
    min-width: 100%;
    min-height: 100%;
    z-index: -1;
    filter: brightness(0.7);

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-image: url("~@/assets/header.jpg");

}

#welcome_typing {
    color: white;
    font-family: 'Roboto', sans-serif;
    font-size: 400%;
    border-right: 0;
    padding-right: 0.05em;
}

#welcome_cursor {
    animation: typing 0.8s infinite;
    font-size: 125%;
    margin-right: 5px;

}

@keyframes typing {
    0% {
        opacity: 0;
    }
    40%, 60% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

</style>