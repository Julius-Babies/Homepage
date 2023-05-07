<template>
    <div class="computer_card">
        <div class="computer_card_os_img_wrapper"><img :src="os_icon" :alt="this.$props.os"></div>
        <div>{{ name }}<br><span>{{ ip }}</span></div>
        <div ref="computer_card_status" class="computer_card_status computer_card_status_loading"></div>
    </div>
</template>

<script>
export default {
    name: "ComputerCard",
    props: {
        name: String,
        ip: String,
        os_icon: String,
        os: String,
    },
    created() {
        console.log("mounted")
        if (localStorage.token === undefined || localStorage.token === '') return
        setTimeout(() => {
            fetch("https://julius.familie-babies.de/api/computer/ping", {
                method: "POST",
                body: JSON.stringify({
                    token: localStorage.token,
                    ip: this.ip
                }),
                headers: {
                    "Content-Type": "application/json"
                },
            })
                .then(response => response.text())
                .then(data => {
                    if (data === 'invalid token') {
                        localStorage.token = ''
                        return
                    }
                    if (data === "1") {
                        this.$refs.computer_card_status.classList.remove("computer_card_status_loading")
                        this.$refs.computer_card_status.style.backgroundColor = "#2b8920"
                    } else {
                        this.$refs.computer_card_status.classList.remove("computer_card_status_loading")
                        this.$refs.computer_card_status.style.backgroundColor = "#ff0000"
                    }
                })
        }, Math.floor(Math.random() * (1000 - 200) + 200))
    }
}
</script>

<style scoped>
.computer_card {
    outline: 1pt solid green;
    display: flex;
    max-width: 300px;
    justify-content: start;
    padding: 11px;
    margin: 0;
    align-items: center;
    font-size: 16px;
}

.computer_card div span {
    font-size: 11px;
    font-style: italic;
}

.computer_card_os_img_wrapper {
    width: 27px;
    height: 27px;
    display: flex;
    justify-content: center;
    align-items: center;
}

img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    padding-right: 10px;
}

.computer_card_status {
    justify-self: end;
    margin-left: auto;

    width: 16px;
    height: 16px;
    overflow: hidden;
    border-radius: 8px;
}

.computer_card_status_loading {
    animation: loading 1s linear infinite;
    border-left: 1pt solid #b2b2b2;
}

@keyframes loading {
    0% {
        rotate: 0deg;
    }
    100% {
        rotate: 360deg;
    }
}
</style>