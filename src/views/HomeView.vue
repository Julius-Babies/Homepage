<template>
    <div class="header" id="header">
        <div id="image"></div>
        <div id="welcome_typing"><span></span><span id="welcome_cursor">|</span></div>
        <div id="welcome_arrow_wrapper" @click="this.$refs.content.scrollIntoView({behavior: 'smooth'})">
            <div id="welcome_arrow">
                <img src="@/assets/arrow_down.png">
                <img src="@/assets/arrow_down.png">
                <img src="@/assets/arrow_down.png">
            </div>
        </div>
    </div>
    <div class="content-gradient"></div>
    <div class="content">
        <article ref="content">
            <h1 style="padding-top: 80px">Über mich</h1>
            <p>
                Hallo, mein Name ist Julius Babies, ich bin Schüler an einem Dresdener Gymnasium und ich beschäftige mich freizeitlich mit dem Gebiet der Softwareentwicklung mit Schwerpunkten in Kotlin, Java und Vue.JS (JavaScript).<br>
                Des weiteren beschäftige ich mich gerne mit der Programmierung von Raspberry Pi und Mikroelektronik.
            </p>
            <p>
                Seit vielen Jahren beschäftige ich mich intensiv mit der Softwareentwicklung und habe im Laufe der Zeit umfassende Kenntnisse in verschiedenen Programmiersprachen erworben. Insbesondere Kotlin, Java und Vue (JavaScript) sind meine bevorzugten Sprachen, in denen ich mich durch zahlreiche Projekte und Programmieraufgaben ständig weiterentwickle.
            </p>
            <p>
                Ich bin begeistert davon, wie die Technologie unsere Welt verändert und wie die Programmierung die Fähigkeit hat, komplexe Probleme zu lösen und neue Möglichkeiten zu schaffen. Ausserdem stehe ich hinter dem Prinzip von Open-Source-Software und freue mich, wenn ich einen Beitrag dazu leisten kann.
            </p>
            <p>
                Mein Ziel ist es, meine Fähigkeiten in der Softwareentwicklung und Mikroelektronik kontinuierlich zu verbessern und neue Technologien zu erlernen. Ich bin immer auf der Suche nach neuen Herausforderungen und Projekten, bei denen ich mein Wissen und meine Fähigkeiten einbringen kann.
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
            </div>
            <p><i>I use arch btw.</i></p>
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
    width: 30px;
    padding: 10px;
    height: 30px;
    text-align: center;
    border-radius: 25px;
    transition: .2s;
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

#welcome_arrow {
    position: relative;
}

#welcome_arrow img {
    width: 20px;
    position: absolute;
    top: 0;
    left: 5px;
}

#welcome_arrow img:nth-of-type(2) {
    top: 10px;
}

#welcome_arrow img:nth-of-type(3) {
    top: 20px;
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