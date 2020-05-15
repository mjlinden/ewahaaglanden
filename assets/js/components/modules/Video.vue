<template>
    <div class="videoWrapper">
        <h1>Ewa Haaglanden in 3 minuten</h1>
        <div class="video">
            <b-embed
                    class="embed"
                    type="iframe"
                    aspect="16by9"
                    v-bind:src="video"
                    allowfullscreen
            ></b-embed>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Video",
        data() {
            return {
                video: "https:\\/\\/www.youtube.com\\/embed\\/bsPkTBn0s7I"
            }
        }
    }
</script>

<style scoped>
    .video {
        width: 80%;
        margin: auto;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.8), 0 12px 40px 0 rgba(0, 0, 0, 0.57);
        border: solid rgba(32, 32, 32, 1) 1px;
    }

    .videoWrapper {
        padding: 6%;
        background-color: #ffb300;
    }
</style>