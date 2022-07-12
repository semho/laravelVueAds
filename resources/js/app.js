require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from "./routes";
import JwPagination from 'jw-vue-pagination';

Vue.use(VueRouter);
Vue.component('home', require('./components/Home.vue').default);
Vue.component('jw-pagination', JwPagination);

let router = new VueRouter({ routes, mode: 'history' });
const app = new Vue({
  el: "#app",
  router,
});
