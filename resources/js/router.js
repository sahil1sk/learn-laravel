import Vue from 'vue'
import Router from 'vue-router'
import FirstPage from './components/pages/FirstPage'

Vue.use(Router)

const routes = [
    {
        path: '/new',
        component: FirstPage
    }
]

export default new Router({
    mode: 'history',
    routes
})