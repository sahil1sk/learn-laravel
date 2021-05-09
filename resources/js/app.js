import Vue from 'vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap'
import router from './router'
import store from './store'
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import common from './common';

import MainComponent from './components/MainComponent.vue'

Vue.mixin(common); // added common mixin method
Vue.use(ViewUI);

new Vue({
    el: '#app',
    render: h => h(MainComponent),
    router,
    store
});