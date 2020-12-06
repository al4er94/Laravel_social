
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false
Vue.use(VueRouter)

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')

