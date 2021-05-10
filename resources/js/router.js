import Vue from 'vue'
import Router from 'vue-router'

import home from './components/pages/home'
import tags from './admin/pages/tags'
import category from './admin/pages/category'
import adminusers from './admin/pages/adminusers'
import login from './admin/pages/login'

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
    {
        path: '/adminusers', 
        component: adminusers,  
    },
    {
        path: '/login', 
        component: login, 
       
    },
]

export default new Router({
    mode: 'history',
    routes
})