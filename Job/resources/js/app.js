require('./bootstrap');

import UserIndex from './header/UserIndex.vue'
import show from './header/show.vue'
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios'
import axios from 'axios'
import { routes } from './routes'

Vue.use(VueRouter)
Vue.use(VueAxios,axios)

const router=new VueRouter({
    mode: 'history',
    routes: routes
});

window.onload = function () {
    var showUser = document.getElementById('showUser');
    var showResume = document.getElementById('showResume');

    if (showUser) {
        const showUser = new Vue({
            el: '#showUser',
            router: router,
            render: h => h(UserIndex),
        })
    }else if(showResume){
        const showResume = new Vue({
            el: '#showResume',
            router: router,
            render: h => h(show),
        })
    }
}
