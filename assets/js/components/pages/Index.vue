<template>
    <div id="index">
        <div class="introductionWrapper">
            <div class="introduction">
                <h1>Een korte uitleg over Ewa Haaglanden</h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac turpis lacinia, sodales massa at, lacinia eros. Maecenas viverra leo ac eleifend tincidunt. Fusce malesuada erat et turpis bibendum, nec eleifend tortor efficitur. Etiam porttitor fermentum elit, ac sagittis est porttitor ac. Ut venenatis lacus ac est suscipit, eu pellentesque felis elementum. Aenean eu facilisis nunc. Aenean porta arcu turpis, quis ultrices massa feugiat ut. Cras blandit, mi eget dictum mollis, ex tortor pretium neque, in sodales arcu libero sed ante.

                    Aenean quis odio elit. Nulla facilisi. In pulvinar ullamcorper mauris et elementum. Sed quis iaculis eros. Sed ut velit eget quam convallis tincidunt sed at nisl. Etiam facilisis augue et venenatis laoreet. Aenean cursus diam eu felis rhoncus, ut luctus sapien euismod. Proin bibendum est sit amet ultricies dictum. Nam sit amet condimentum nisl, sed eleifend magna. Integer blandit nibh id nisi pharetra tempus. Donec pellentesque sollicitudin nisi. Donec sodales dignissim euismod. Nulla nulla elit, mattis nec arcu sed, volutpat rutrum ex. Nulla efficitur, arcu et auctor mollis, libero ex aliquam enim, at suscipit augue velit a orci. Phasellus tellus lectus, dapibus in lectus quis, bibendum condimentum mauris. </p>
            </div>
        </div>
        <Video />
        <RecentNews />
        <PartnerCarousel />
    </div>
</template>

<script>
    import Vue from 'vue'

    //importing Bootstrap
    import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
    import 'bootstrap/dist/css/bootstrap.css'
    import 'bootstrap-vue/dist/bootstrap-vue.css'

    //importing all our modules
    import Video from "../modules/Video";
    import RecentNews from "../modules/RecentNews";
    import PartnerCarousel from "../modules/PartnerCarousel";
    import VueCarousel from '@chenfengyuan/vue-carousel';

    Vue.use(BootstrapVue);
    Vue.use(IconsPlugin);
    Vue.use(VueCarousel);

    export default {
        name: 'Index',
        components: {
            RecentNews,
            PartnerCarousel,
            Video
        }
    }
</script>

<style>
    h1 {
        padding: 20px;
        font-size: 40px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: 'Lato', 'HelveticaNeue', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        color: black;
    }
    .carouselSlider {
        background-color: #66bfff;
    }
    .carousel {
        width: 50%;
        margin: auto;
    }
    .carousel__item {
        align-items: center;
        background-color: #66bfff;
        color: #999;
        display: flex;
        font-size: 1.5rem;
        justify-content: center;
        height: 8vh;
    }
    .slide {
        height: 100%;
    }
    .pageButton {
        margin: 20px;
        border: solid rgba(16, 16, 16, 0.5) 1px;
    }

    .introduction {
        min-width: 20%;
        max-width: 50%;
        display: inline-block;
        border: solid rgba(128, 128, 128, 0.5) 1px;
        margin: 30px;
        background-color: white;
        /*box-shadow: 10px 10px 10px;*/
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }

    .introduction p {
        padding: 20px;
    }

    .introductionWrapper {
        background-color: rgba(128, 128, 128, 0.1);
    }
</style>
