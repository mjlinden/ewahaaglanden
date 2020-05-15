<template>
    <div class="NewsItems">
        <b-container>
            <b-row>
                <b-col>
                    <h1>Nieuwsberichten</h1>
                </b-col>
            </b-row>
            <b-row class="newsItemRow justify-content-md-center">
                <b-col md="5" to="nieuwsberichten" class="newsItemCol" v-for="newsItem in newsItemsInformation" :key="newsItem">
                    <router-link :to="{ name: 'newsitem', params: { newsItemId: newsItem.id, newsItemTitle: newsItem.Title } }">
                        <div class="newsItemImage">
                            <img v-bind:src="newsItem.Image">
                            <h2> {{ newsItem.Title }} </h2>
                        </div>
                    </router-link>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
    import axios from 'axios';

    let info =  null;
    let loading = true;
    let errored = false;

    let newsItemsInformation = [];
    let newsItemsArray = [];

    function getFilteredPartnerImages(newsItems) {
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

            newsItemsArray.push(newsItemInfoArray);
        });

        return newsItemsArray
    }

    export default {
        name: "NewsItems",
        data() {
            return {
                info: info,
                loading: loading,
                errored: errored,
                newsItemsInformation: newsItemsInformation
            };
        },
        mounted() {
            axios
                .get('http://localhost/EWA_Symfony/public/index.php/api/news/all')
                .then(
                    response => {
                        this.info = response.data
                        this.newsItemsInformation = getFilteredPartnerImages(response.data).slice(0, this.info.length)
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
    .newsItemCol {
        border: solid rgba(128, 128, 128, 0.5) 1px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
        margin: 20px;
        padding: 20px;
        transition: 300ms;
        background-color: white;
    }
    .newsItemCol:hover {
        -webkit-transform: scale(1.1);
        transition: 300ms;
        box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.4), 0 18px 60px 0 rgba(0, 0, 0, 0.38);
    }
    .newsItemImage {
        margin: auto;
    }
</style>