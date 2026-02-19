import { createRouter, createWebHistory } from "vue-router";

import Login from '../components/Auth/login.vue';
import Register from '../components/Auth/register.vue';
import Dashboard from "../components/dashboard/dashboard.vue";
import Chat from "../components/dashboard/Chat.vue";

const routes = [
    { path: '/', redirect: '/login' },
    { path: '/login', component: Login, meta: {title: "Login"} },
    { path: '/register', component: Register,  meta: {title: "Register"} },
    { path: '/chat', component: Chat },

    { path: '/dashboard', component: Dashboard, meta: { requiresAuth: true, title: "Dashboard" } },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {

    const appName = import.meta.env.VITE_APP_NAME || "vChat";
    document.title = to.meta.title ? `${to.meta.title} - ${appName}` : appName;
  
    const token = localStorage.getItem("token");

        if(to.meta.requiresAuth && !token){
            next('/login');
        } else {
            next();
        }
    })

export default router