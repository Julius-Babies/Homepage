<template>
    <div id="content">
        <div class="content"
             v-if="!(this.localStorage.token === undefined || this.localStorage.token === '') || showContent">
            <div id="services" class="content">
                <h2 style="margin-top: 0; padding-top: 0">Dienste</h2>
                <div>
                    <ServiceCard name="Guacamole" :icon_url="require('@/assets/guacamole.png')"
                                 url="https://julius.familie-babies.de/guacamole"/>
                    <ServiceCard name="phpMyAdmin" :icon_url="require('@/assets/pma.png')"
                                 url="https://pma.infrastructure.jvbabi.es"/>
                    <ServiceCard name="Bitwarden" :icon_url="require('@/assets/bitwarden.png')"
                                 url="https://bitwarden.jvbabi.es"/>
                    <ServiceCard name="Webmail" :icon_url="require('@/assets/strato_logo_white.svg')"
                                 url="https://webmail.strato.de/appsuite/signin"/>
                    <ServiceCard name="Portainer" :icon_url="require('@/assets/portainer.png')"
                                 url="https://portainer.infrastructure.jvbabi.es"/>
                    <ServiceCard name="GitLab" :icon_url="require('@/assets/gitlab.svg')"
                                 url="https://gitlab.jvbabi.es"/>
                </div>
            </div>
            <div id="computers" class="content">
                <h2>Geräte</h2>
                <div>
                    <ComputerCard name="magnix" ip="192.168.3.102" os="Manjaro"
                                  :os_icon="require('@/assets/manjaro.svg')"></ComputerCard>
                    <ComputerCard name="amnesix" ip="192.168.3.11" os="Ubuntu"
                                  :os_icon="require('@/assets/ubuntu.png')"></ComputerCard>
                    <ComputerCard name="pi" ip="192.168.3.193" os="Raspbian"
                                  :os_icon="require('@/assets/raspberrypi.png')"></ComputerCard>
                    <ComputerCard name="kiste" ip="192.168.3.174" os="Ubuntu"
                                  :os_icon="require('@/assets/ubuntu.png')"></ComputerCard>
                </div>
            </div>
            <div id="sockets" class="content">
                <h2>Steckdosen</h2>
                <div>
                    <SocketCard id="0" name="Fenstersteckdose" location="Julius' Zimmer" :icon="require('@/assets/window.png')"></SocketCard>
                    <SocketCard id="0" name="Fenstersteckdose" location="Julius' Zimmer" :icon="require('@/assets/window.png')"></SocketCard>
                </div>
            </div>
            <div class="content">
                <h1 @click="logout()">Logout</h1>
            </div>
        </div>
        <div id="login"
             v-show="this.localStorage.token === undefined || this.localStorage.token === '' || !showContent">
            <h1>Login</h1>
            <div>
                <form onsubmit="return false" id="intern_login_form">
                    <input placeholder="Benutzername oder E-Mail-Adresse" type="text" ref="email" v-on:keydown.enter="this.$refs.pass.focus()">
                    <input placeholder="Passwort" type="password" ref="pass" v-on:keydown.enter="this.$refs.login_submit_button_wrapper.click()">
                    <div id="login_submit_button_wrapper" ref="login_submit_button_wrapper" @click="login">
                        <div id="login_submit_button" type="submit" v-if="!this.loginLoading">
                            <img :src="require('@/assets/arrow_right_alt_FILL0_wght400_GRAD0_opsz48.svg')"
                                 id="login_submit_button_arrow" alt="">
                            <span id="login_submit_button_text">Login</span>
                        </div>
                        <div v-else id="login_submit_button_loading">
                            <div class="rotating"></div>
                            Loading...
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
import ServiceCard from "@/components/internal/ServiceCard.vue";
import ComputerCard from "@/components/internal/ComputerCard.vue";
import SocketCard from "@/components/internal/SocketCard.vue";

const SHA256 = require("crypto-js/sha256");
export default {
    name: "InternView",
    components: {SocketCard, ComputerCard, ServiceCard},
    data() {
        return {
            localStorage: localStorage,
            loginLoading: false,
            showContent: false
        }
    },
    methods: {
        login() {
            // get data
            const email = this.$refs.email.value
            const pass = SHA256(this.$refs.pass.value).toString()

            // check if data is valid
            if (email === '') this.$refs.email.style.borderColor = 'red'
            if (this.$refs.pass.value === '') this.$refs.pass.style.borderColor = 'red'
            if (this.loginLoading || this.$refs.email.value === '' || this.$refs.pass.value === '') return

            // show loading animation
            this.loginLoading = true
            this.$refs.login_submit_button_wrapper.classList.add("login_loading")

            // send request to test credentials
            fetch("https://julius.familie-babies.de/api/auth/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    username: email,
                    password: pass
                })
            }).then(response => {
                if (response.status === 200) {
                    response.json().then(data => {
                        if (data.token === "ERR_INVALID_CREDENTIALS") {
                            this.$refs.login_submit_button_wrapper.classList.remove("login_loading")
                            this.loginLoading = false
                            alert("Falsche Zugangsdaten")
                            return
                        }
                        this.localStorage.token = data.token
                        this.$refs.login_submit_button_wrapper.classList.remove("login_loading")
                        this.loginLoading = false
                        this.showContent = true
                    })
                } else {
                    this.$refs.login_submit_button_wrapper.classList.remove("login_loading")
                    this.loginLoading = false
                    alert("Login fehlgeschlagen")
                }
            }).catch(() => {
                this.$refs.login_submit_button_wrapper.classList.remove("login_loading")
                this.loginLoading = false
                alert("Login fehlgeschlagen")
            })
        },
        logout() {
            this.localStorage.token = ''
            this.showContent = false
        }
    },
    mounted() {
        fetch("https://julius.familie-babies.de/api/auth/renew", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                token: this.localStorage.token
            })
        }).then(response => {
            if (response.status === 200) {
                response.text().then(data => {
                    console.log(data)
                    if (data === "ERR_INVALID_TOKEN") {
                        this.localStorage.token = ''
                        this.showContent = false
                    } else if (data === "success") {
                        this.showContent = true
                    }
                })
            }
        })
    }
}
</script>

<style scoped>
#content div {
    margin: 15px;
}

/* Form */
#intern_login_form {
    display: flex;
    width: 300px;
    flex-direction: column;
}

@media screen and (max-width: 350px) {
    #intern_login_form {
        width: auto;
    }
}

#computers > div, #sockets > div {
    display: grid;
    width: fit-content;
    grid-template-columns: repeat(2, 1fr);
    grid-auto-rows: 1fr;
    gap: 4px;
    border-radius: 20px;
    overflow: hidden;
    padding: 1px;
}

input {
    color: white;
    background: transparent;
}

#intern_login_form > input, #login_submit_button_wrapper {
    display: flex;
    height: 35px;
    width: auto;
    margin: 0 0 10px !important;
    font-size: 15px;
    line-height: 13px;
    padding: 10px;
    border: 1px solid gray;
    border-radius: 5px;
}

#login_submit_button, #login_submit_button_loading {
    display: flex;
    align-items: center;
    margin: 0 !important;
}

#login_submit_button_wrapper {
    transition: .3s;
}

.login_loading {
    background: dodgerblue;
    color: white;
}

#login_submit_button_arrow {
    width: 30px;
    position: absolute;
}

#login_submit_button_text {
    transition: .5s;
    user-select: none;
}

#login_submit_button_arrow {
    opacity: 0;
    transition: .6s;
}

#login_submit_button_wrapper:hover #login_submit_button_text {
    margin-left: 30px;
}

#login_submit_button_wrapper:hover #login_submit_button_arrow {
    opacity: 1;
    margin-left: 3px;
}

.content {
    margin: 0 !important;
    padding: 5px !important;
}

.rotating {
    animation: loading 1s linear infinite;
    border-left: 1pt solid #ffffff;
    width: 16px;
    height: 16px;
    overflow: hidden;
    border-radius: 8px;
}

@keyframes loading {
    0% {
        rotate: 0deg;
    }
    100% {
        rotate: 360deg;
    }
}

@media screen and (max-width: 700px) {
    #services div {
        width: auto;
        white-space: nowrap;
        overflow-x: scroll;
        overflow-y: scroll;
        scrollbar-width: none;
    }

    #computers > div, #sockets > div {
        grid-template-columns: repeat(1, 1fr);
    }

    #services::-webkit-scrollbar {
        display: none;
    }

    #computers, #sockets {
        width: auto;
    }

}
</style>
