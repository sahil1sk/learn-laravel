import Vue from 'vue'
import Router from 'vue-router'

import home from './components/pages/home'
import tags from './components/pages/tags'


Vue.use(Router)

const routes = [
    //projects routes....
    {
        path: '/', 
        component: home, 
       
    },
    {
        path: '/tags', 
        component: tags, 
       
    },
]

export default new Router({
    mode: 'history',
    routes
})