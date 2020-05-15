// ./router/index.js
import Vue from 'vue'
import VueRouter from 'vue-router'

//imported components for the router
import Index from "../components/pages/Index";
import Contact from "../components/pages/Contact";
import NewsItems from "../components/pages/NewsItems";
import Partners from "../components/pages/Partners";
import About from "../components/pages/About";
import NewsItem from "../components/pages/NewsItem";

Vue.use(VueRouter);

const router= new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Index
        },
        {
            path: '/partners',
            name: 'partners',
            component: Partners
        },
        {
            path: '/nieuwsberichten',
            name: 'newsitems',
            component: NewsItems
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/informatie',
            name: 'about',
            component: About
        },
        {
            path: '/nieuwsbericht/:newsItemTitle',
            name: 'newsitem',
            component: NewsItem
        }
    ]
})
router.replace({ path: 'home', redirect: '/' })
export default router