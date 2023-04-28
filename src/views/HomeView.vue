<template>
    <Header color="white"></Header>
    <div class="header" id="header">
        <div id="image"></div>
        <div id="welcome_typing"><span></span><span id="welcome_cursor">|</span></div>
        <div id="welcome_arrow_wrapper">
            <div id="welcome_arrow">
                <img src="@/assets/arrow_down.png">
                <img src="@/assets/arrow_down.png">
                <img src="@/assets/arrow_down.png">
            </div>
        </div>
    </div>
    <div class="content-gradient"></div>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
            diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
            diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
            accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
            dolor sit amet.

            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
            feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
            delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea
            commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
            illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
            luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

            Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
            possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
            ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.

            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
            feugiat nulla facilisis.

            At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur

            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
            diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
            diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
            accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum
            dolor sit amet.

            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
            feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
            delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea
            commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
            illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
            luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

            Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
            possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
            ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.

            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
            feugiat nulla facilisis.

            At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</p>
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
    width: 100%;
    overflow: hidden;
    height: calc( 100vh - 200px);
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