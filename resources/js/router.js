import Vue from 'vue'
import Router from 'vue-router'

import home from './components/pages/home'
import tags from './admin/pages/tags'
import category from './admin/pages/category'


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
    {
        path: '/category', 
        component: category,  
    },
]

export default new Router({
    mode: 'history',
    routes
})