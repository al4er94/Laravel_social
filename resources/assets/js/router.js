import Vue from 'vue';
import VueRouter from 'vue-router'
import Auth from './components/Auth'
import Work from './components/Work'


Vue.use(VueRouter);
export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin',
            name: 'auth',
            component: Auth
        },
        {
            path: '/admin/work',
            name: 'work',
            component: Work
        }
    ]
})

