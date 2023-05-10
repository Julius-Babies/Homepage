<template>
    <div class="computer_card">
        <div class="computer_card_icon_wrapper"><img ref="computer_card_img" class="computer_card_icon" @load="getAvgColor" :src="os_icon"
                                                     :alt="this.$props.os"></div>
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
    data() {
        return {
            window: window,
            backgroundColor: "rgba(0, 0, 0, 0.8)"
        }
    },
    methods: {
        getAvgColor() {
            const img = this.$refs.computer_card_img;
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            const imgWidth = img.width;
            const imgHeight = img.height;
            canvas.width = imgWidth;
            canvas.height = imgHeight;
            ctx.drawImage(img, 0, 0, imgWidth, imgHeight);
            const imageData = ctx.getImageData(0, 0, imgWidth, imgHeight).data;
            let red = 0, green = 0, blue = 0;
            for (let i = 0; i < imageData.length; i += 4) {
                red += imageData[i];
                green += imageData[i + 1];
                blue += imageData[i + 2];
            }
            const pixels = imageData.length / 4;
            const avgRed = red / pixels;
            const avgGreen = green / pixels;
            const avgBlue = blue / pixels;
            const darken = 0.3; // adjust to darken or lighten the color
            this.backgroundColor = `rgba(${Math.round(avgRed * darken)}, ${Math.round(avgGreen * darken)}, ${Math.round(avgBlue * darken)}, 0.8)`
        }
    },
    created() {
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
                        this.$refs.computer_card_img.classList.remove("gray")
                    } else {
                        this.$refs.computer_card_status.classList.remove("computer_card_status_loading")
                        this.$refs.computer_card_status.style.backgroundColor = "#ff0000"
                        this.$refs.computer_card_img.classList.add("gray")
                    }
                })
        }, Math.floor(Math.random() * (1000 - 200) + 200))
    },
    mounted() {
        this.$el.style.margin = "0"
    }
}
</script>

<style scoped>
.computer_card {
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

.computer_card div span {
    font-size: 11px;
    font-style: italic;
}

.computer_card_icon_wrapper {
    width: 27px;
    height: 27px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.computer_card_icon {
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

.computer_card:hover {
    background: v-bind(backgroundColor);
}
</style>