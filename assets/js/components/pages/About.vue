<template>
    <div class="About">
        <b-container>
            <b-row>
                <b-col>
                    <h1>Informatie</h1>
                </b-col>
            </b-row>
            <b-row class="partnerRow" v-for="partner in partnersInformation" :key="partner">
                <b-col class="newsItemCol">
                    <div class="aboutImage">
                        <img v-bind:src="partner.Image">
                        <h2> {{ partner.Title }} </h2>
                    </div>
                    <div class="aboutDescription" v-html="partner.Description"></div>
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

    let partnersInformation = [];
    let partnersArray = [];

    function getFilteredPartnerImages(partners) {
        partners.forEach(function (partner) {
            let partnerArray = Object.entries(partner);
            let partnerInfoArray = [];

            partnerArray.forEach(function (partnerInfo) {
                if(partnerInfo[0] === "Image") {
                    partnerInfoArray[partnerInfo[0]] = 'http://localhost/EWA_Symfony/public/uploads/files/news/' + partnerInfo[1];
                } else {
                    partnerInfoArray[partnerInfo[0]] = partnerInfo[1];
                }
            });

            partnersArray.push(partnerInfoArray);
        });

        // console.log(partnersArray);
        return partnersArray
    }

    export default {
        name: "About",
        data() {
            return {
                info: info,
                loading: loading,
                errored: errored,
                partnersInformation: partnersInformation
            };
        },
        mounted() {
            axios
                .get('http://localhost/EWA_Symfony/public/index.php/api/information/all')
                .then(
                    response => {
                        this.info = response.data
                        this.partnersInformation = getFilteredPartnerImages(response.data).slice(0, this.info.length)
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
    .aboutImage {
        padding: 20px;
        float: left;
    }
    .aboutDescription {
        padding: 20px;
        margin: auto;
    }

    /*.partnerCol:last-child {*/
    /*    border: solid rgba(128, 128, 128, 0.5) 1px;*/
    /*    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);*/
    /*    margin: auto;*/
    /*    transition: 300ms;*/
    /*    !*display: inline-block;*!*/
    /*    !*min-width: fit-content;*!*/
    /*}*/

</style>