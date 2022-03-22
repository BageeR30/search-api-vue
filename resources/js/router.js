import Vue from "vue";
import VueRouter from 'vue-router';

Vue.use(VueRouter);


import ExampleComponent from './components/ExampleComponent'
export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: ExampleComponent
        },
    ],
});
