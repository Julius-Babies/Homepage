<script>
export default {
    name: "E404",
    created() {
        this.redirect()
    },
    methods: {
        redirect() {
            if (this.$route.meta.redirect) {
                window.location.href = '/public/';
                window.location.href = 'https://julius.familie-babies.de/error/404';
            }
        }
    }
}
</script>

<template>
    <div id="content">
        <div class="content">
            <h1>Error 404</h1>
            Nicht das gefunden, was du gesucht hast? <a href="/" class="unstyled_link" style="text-decoration: underline">Zurück zur Startseite</a>
        </div>
    </div>
</template>

<style scoped>
.content {
    margin: 0 !important;
    padding: 5px !important;
}
</style>