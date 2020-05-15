<template>
    <div class="recentNewsWrapper">
        <h1>Recentste Nieuwsberichten</h1>
        <div class="recentNews">
            <router-link :to="{ name: 'newsitem', params: { newsItemId: newsItem.id, newsItemTitle: newsItem.Title } }" href="#" v-for="newsItem in Array.from(new Set(info))" :key="newsItem">
                <img :src="newsItem.Image" class="NewsImage">
            </router-link>
        </div>
        <b-button class="pageButton" to="nieuwsberichten">Bekijk alle nieuwsberichten</b-button>
    </div>
</template>

<script>
    import axios from 'axios'

    let info =  null;
    let loading = true;
    let errored = false;

    const newsItemImages = [];

    function getFilteredNewsImages(recentNewsItems) {
        recentNewsItems.forEach(function (newsItem) {
            let newsItemArray = Object.entries(newsItem);
            let newsItemInfoArray = [];

            newsItemArray.forEach(function (newsItemInfo) {
                if(newsItemInfo[0] === "Image") {
                    newsItemInfoArray[newsItemInfo[0]] = 'http://localhost/EWA_Symfony/public/uploads/files/news/' + newsItemInfo[1];
                } else {
                    newsItemInfoArray[newsItemInfo[0]] = newsItemInfo[1];
                }
            });

            newsItemImages.push(newsItemInfoArray);
        });

        return newsItemImages
    }

    export default {
        name: "RecentNews",
        data () {
            return {
                info: info,
                loading: loading,
                errored: errored
            }
        },
        mounted () {
            axios
                .get('http://localhost/EWA_Symfony/public/index.php/api/news/recent/3')
                .then(
                    response => {
                        this.info = getFilteredNewsImages(response.data).slice(0, 3)
                    })
                .catch(error =>{
                    console.log(error)
                    errored = true
                })
                .finally(() => loading = false)
        }
    }
</script>

<style scoped>
    .NewsImage {
        border: solid rgba(128, 128, 128, 0.5) 1px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
        margin: 20px;
        padding: 20px;
        transition: 300ms;
        background-color: white;
    }
    .NewsImage:hover {
        -webkit-transform: scale(1.1);
        transition: 300ms;
        box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.4), 0 18px 60px 0 rgba(0, 0, 0, 0.38);
    }
</style>