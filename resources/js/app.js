import Vue from 'vue'
import MainComponent from './components/MainComponent.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap'
import router from './router'
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';

Vue.use(ViewUI);

new Vue({
    el: '#app',
    render: h => h(MainComponent),
    router
});