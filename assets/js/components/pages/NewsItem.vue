<template>
    <div class="post">
        <div class="content">
            <img :src="newsItemInformation.Image">
            <h1>{{ newsItemInformation.Title }}</h1>
            <h2 v-html="newsItemInformation.Description"></h2>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    let info =  null;
    let loading = true;
    let errored = false;

    let newsItemInformation = [];
    let newsItemsArray;

    function getMappedNewsItem(newsItems) {
        newsItems.forEach(function (newsItem) {
            let newsItemArray = Object.entries(newsItem);
            let newsItemInfoArray = [];

            newsItemArray.forEach(function (newsItemInfo) {
                if(newsItemInfo[0] === "Image") {
                    newsItemInfoArray[newsItemInfo[0]] = 'http://localhost/EWA_Symfony/public/uploads/files/news/' + newsItemInfo[1];
                } else {
                    newsItemInfoArray[newsItemInfo[0]] = newsItemInfo[1];
                }
            });

            newsItemsArray = newsItemInfoArray;
        });

        return newsItemsArray
    }

    export default {
        name: "NewsItem",
        data() {
            return {
                info: info,
                loading: loading,
                errored: errored,
                newsItemInformation: newsItemInformation
            };
        },
        mounted() {
            axios
                .get('http://localhost/EWA_Symfony/public/index.php/api/news/id/' + this.$route.params.newsItemId)
                .then(
                    response => {
                        this.info = response.data
                        this.newsItemInformation = getMappedNewsItem(response.data)
                    })
                .catch(error =>{
                    console.log(error)
                    errored = true
                })
                .finally(() => loading = false)
        }
    }
</script>
<!--console.log(this.$route.params.newsItemId)-->
<style scoped>

</style>