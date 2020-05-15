import Vue from 'vue'
import App from './App.vue'

import router from './router/router';
// import RecentNews from "./newsitems/RecentNews";

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router
  // RecentNews
}).$mount('#app')