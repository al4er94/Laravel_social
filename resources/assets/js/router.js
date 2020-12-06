import Vue from 'vue';
import Router from 'vue-router'
import Auth from './components/Auth'
import ExampleComponent from './components/ExampleComponent'


Vue.use(Router);
export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/admin',
            component: Auth
        },
        {
            path: '/admin/work',
            component: ExampleComponent
        }
    ]
})

