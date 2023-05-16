<template>
    <div class="header" id="header">
        <div id="welcome_typing"><span></span><span id="welcome_cursor">|</span></div>
        <div id="welcome_arrow_wrapper" @click="this.$refs.content.scrollIntoView({behavior: 'smooth'})">
            <div id="welcome_arrow">
                <div class="arrow" style="animation-delay: 0ms !important;"></div>
                <div class="arrow" style="animation-delay: 500ms !important;"></div>
                <div class="arrow" style="animation-delay: 1000ms !important;"></div>
            </div>
        </div>
    </div>
    <div class="content-gradient"></div>
    <div class="content">
        <article ref="content">
            <h1 style="padding-top: 80px">Über mich</h1>
            <p>
                Hi, 👋 ich bin Julius Babies, ein engagierter Schüler am Gymnasium in Dresden. Meine Leidenschaft gilt der Softwareentwicklung, und ich habe bereits Erfahrungen in Kotlin, Java und Vue.JS (JavaScript) gesammelt.
            </p>
            <p>
                Mein Ziel ist es, meine Fähigkeiten weiter zu verbessern und an spannenden Projekten teilzunehmen. Die rasante Entwicklung der Technologie fasziniert mich, und ich bin davon überzeugt, dass Programmierung komplexe Probleme lösen kann. Open-Source-Software ist für mich von großer Bedeutung, und ich engagiere mich gerne dafür.
            </p>
            <p>
                Wenn du Fragen hast oder Interesse an Diskussionen hast, stehe ich zur Verfügung:
            </p>
            <h1>(Soziale) Netzwerke</h1>
            <div style="display: flex">
                <SocialMediaCard name="GitHub" url="https://github.com/Julius-Babies"
                                 :icon_url="require('@/assets/github.svg')" color="rgba(0, 0, 0, 0.5)"></SocialMediaCard>
                <SocialMediaCard name="Twitter" url="https://twitter.com/@juliusbabies"
                                 :icon_url="require('@/assets/twitter.svg')"
                                 color="rgba(4, 46, 72, 0.5)"></SocialMediaCard>
                <SocialMediaCard name="Matrix" url="https://matrix.to/#/@julius-babies:matrix.org"
                                 :icon_url="require('@/assets/matrix.svg')"
                                 color="rgba(6, 62, 47, 0.5)"></SocialMediaCard>
                <SocialMediaCard name="LinkedIn" url="https://www.linkedin.com/in/julius-babies-47a453250/"
                                 :icon_url="require('@/assets/linkedin.png')"
                                 color="rgba(0, 68, 113, 0.5)"></SocialMediaCard>
            </div>
        </article>
    </div>
</template>

<script>
// @ is an alias to /src
import Header from "@/components/Header.vue";
import SocialMediaCard from "@/components/home/SocialMediaCard.vue";

export default {
    name: 'HomeView',
    components: {SocialMediaCard, Header},
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

<style scoped>

.content {
    padding: 30px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
}

.content-gradient {
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8));
    height: 200px;
}

.info {
    border: 1pt solid orange;
}

#header {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 100%;
    overflow: hidden;
    height: calc(100vh - 200px);
}

#welcome_arrow_wrapper {
    position: absolute;
    bottom: 80px;
    padding: 10px;
    text-align: center;
    border-radius: 25px;
    transition: .2s;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
}

#welcome_arrow_wrapper {
    justify-self: center;
    align-self: center;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
}

article {
    font-size: 14pt;
}

article a {
    color: white;
}

#welcome_arrow_wrapper:hover {
    background-color: rgba(0, 0, 0, 0.5);
}

#welcome_arrow div {
    position: absolute;
    top: 0px;
    left: 27px;
}

#welcome_arrow div:nth-of-type(2) {
    top: 15px;
}

#welcome_arrow div:nth-of-type(3) {
    top: 30px;
}

#welcome_typing {
    color: white;
    font-family: 'Roboto', sans-serif;
    font-size: 400%;
    border-right: 0;
    padding-right: 0.05em;
}

.arrow {
    width: 15px;
    height: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    justify-self: center;
    align-self: center;
    padding: 3px;
    transform: rotate(45deg);
    position: absolute;
    animation: glow 3s infinite;
    top: -5px;
    left: -5px;
    border: solid white;
    border-width: 0 5px 5px 0;
}

@keyframes glow {
    0% {
        filter: drop-shadow(0 0 0 white);
    }
    20% {
        filter: drop-shadow(0 0 10px white);
    }
    40% {
        filter: drop-shadow(0 0 0 white);
    }
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