<template>
    <div class="carouselSlider">
        <h1>Partners</h1>
        <carousel :data="Array.from(new Set(info))" :indicators="false" :controls="false" :interval="2000"></carousel>
        <b-button class="pageButton" to="partners">Leer meer</b-button>
    </div>
</template>

<script>
    import axios from 'axios'

    let info =  null;
    let loading = true;
    let errored = false;

    const carouselData = [];

    function getFilteredPartnerImages(partners) {
        partners.forEach(function (partner) {
            if (partner.Image !== null) {
                const partnerImage = 'http://localhost/EWA_Symfony/public/uploads/files/partner/' + partner.Image;

                carouselData.push(
                    /**
                     * Render function which returns VNode.
                     * @param {Function} createElement - The function for creating element.
                     * @param {*} content - The current slide content.
                     * @param {Vue} context - The current slide instance.
                     */
                    function render(createElement) {
                        return createElement('img', {attrs: {src: [partnerImage], class: 'slide'}});
                    }
                )
            }
        });

        return carouselData
    }

    export default {
        data() {
            return {
                info: info,
                loading: loading,
                errored: errored
            };
        },
        mounted() {
            axios
                .get('http://localhost/EWA_Symfony/public/index.php/api/partner/all')
                .then(
                    response => {
                        this.info = getFilteredPartnerImages(response.data)
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
</style>