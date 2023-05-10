<template>
    <div class="socket_card">
        <div class="socket_card_icon_wrapper"><img ref="socket_card_icon" class="socket_card_icon" :src="icon" alt=""></div>
        <div>{{ name }}<br><span>{{ location }}</span></div>
        <div ref="socket_card_status" class="socket_card_status socket_card_status_loading"></div>
    </div>
</template>

<script>
export default {
    name: "SocketCard",
    props: {
        id: Number,
        name: String,
        location: String,
        icon: String
    },
    created() {
        if (localStorage.token === undefined || localStorage.token === '') return
        setTimeout(() => {
            fetch("https://julius.familie-babies.de/api/socket/get", {
                method: "POST",
                body: JSON.stringify({
                    token: localStorage.token,
                    id: this.id
                }),
                headers: {
                    "Content-Type": "application/json"
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data === {}) {
                        localStorage.token = ''
                    } else if (data.state === true) {
                        this.$refs.socket_card_status.classList.remove("socket_card_status_loading")
                        this.$refs.socket_card_status.style.backgroundColor = "#2b8920"
                        this.$refs.socket_card_img.classList.remove("gray")
                    } else {
                        this.$refs.socket_card_status.classList.remove("socket_card_status_loading")
                        this.$refs.socket_card_status.style.backgroundColor = "#ff0000"
                        this.$refs.socket_card_img.classList.add("gray")
                    }
                })
        }, Math.floor(Math.random() * (1000 - 200) + 200))
    }
}
</script>

<style scoped>
.socket_card {
    user-select: none;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    width: 300px;
    justify-content: start;
    padding: 11px 11px 11px 19px;
    border-radius: 5px;
    margin: 0;
    align-items: center;
    font-size: 16px;
    transition: all .5s;
}

.socket_card div span {
    font-size: 11px;
    font-style: italic;
}

.socket_card_icon_wrapper {
    width: 27px;
    height: 27px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.socket_card_icon {
    filter: grayscale(0);
    transition: filter .5s;
}

.gray {
    filter: grayscale(100%);
}

img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    padding-right: 10px;
}

.socket_card_status {
    justify-self: end;
    margin-left: auto;

    width: 16px;
    height: 16px;
    overflow: hidden;
    border-radius: 8px;
}

.socket_card_status_loading {
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

.socket_card:hover {
    background: v-bind(backgroundColor);
}
</style>