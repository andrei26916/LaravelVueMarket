/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from "vue";
import Toast, {TYPE} from "vue-toastification";
import store from './store';
import VueRouter from 'vue-router';
import router from './router';
import App from './components/App'
import ElementUI from 'element-ui';
import { BContainer } from 'bootstrap-vue';
import IndexLayout from "./layouts/Index"
import AdminLayout from "./layouts/Admin"
import DefaultLayout from "./layouts/Default"
import {mapMutations} from "vuex";

// Import the CSS or use your own!
import "vue-toastification/dist/index.css";
import Default from "./layouts/Default";

require('./bootstrap');

window.Vue = require('vue');

const options = {
    // You can set your default options here
};


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("Default-layout", DefaultLayout);
Vue.component("index-layout", IndexLayout);
Vue.component("admin-layout", AdminLayout);
Vue.use(Toast, options);
Vue.use(VueRouter);
Vue.use(ElementUI);
Vue.component('b-container', BContainer);
// Vue.component('news-component', require('./components/NewsComponent').default);
// Vue.component('production-component', require('./components/ProductionComponent').default);
// Vue.component('auth-component', require('./components/AuthComponent').default);
// Vue.component('reg-component', require('./components/RegistrationComponent').default);
// Vue.component('profile-component', require('./components/ProfileComponent').default);
// Vue.component('basket-component', require('./components/BasketComponent').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

axios.interceptors.response.use((response) => {
    if (response.config.method === "post"){
        Vue.$toast("??????????????", {
            timeout: 300,
            type: TYPE.SUCCESS,
        });
    }
    return response
}, error => {
    if (error.response.status === 422)
    {
        for (let key in error.response.data.errors) {
            Vue.$toast(error.response.data.errors[key][0], {
                timeout: 4000,
                type: TYPE.WARNING,
            });
        }
    } else if (error.response.status === 402){
        Vue.$toast("???????????????? email ?????? ????????????", {
            timeout: 4000,
            type: TYPE.WARNING,
        });
    } else if (error.response.status === 403 || error.response.status === 401){
        Vue.$toast("??????????????????????????", {
            timeout: 4000,
        });
    }else{
        Vue.$toast("???????????? ??????????????", {
            timeout: 3000,
            type: TYPE.ERROR,
        });
    }
})

const mountEl = document.querySelector("#app");

const app = new Vue({
    store,
    router,
    propsData: { ...mountEl.dataset },
    props: ['user'],
    components: { App },
    el: '#app',
    methods: {
        ...mapMutations(['createUser']),
    },
    mounted() {
        let user = JSON.parse(this.user);
        this.createUser(user)
        // axios
        //     .get('/api/categories')
        //     .then(response => (this.categories = response.data));
        // console.log(this.categories)
    }
});
