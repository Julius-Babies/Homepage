<script>
export default {
    name: "E404",
    created() {
        this.redirect()
    },
    methods: {
        redirect() {
            // Check if public folder exists
            // If yes, redirect to the public folder
            window.location.href = '/public/';

            // If the public folder does not exist, redirect to google.de
            window.location.href = 'https://www.google.de';
        }
    }
}
</script>

<template>
    <h1>404</h1>
</template>

<style scoped>

</style>