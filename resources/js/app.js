import Vue from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap'
import router from './router'

new Vue({
    el: '#app',
    render: h => h(ExampleComponent),
    router
});