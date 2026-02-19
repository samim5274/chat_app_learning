import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'

const appName = import.meta.env.VITE_APP_NAME || "vChat";
document.title = appName;

createApp(App).use(router).mount('#app')
