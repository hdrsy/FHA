import { createApp } from 'vue'
import { createPinia } from 'pinia'

import './assets/main.css'
import 'jquery';
import 'bootstrap/dist/js/bootstrap';
// import 'summernote/dist/summernote';
import App from './App.vue'
import router from './router'; // Import your router configuration

const pinia = createPinia()
const app = createApp(App)

app.use(pinia)
app.use(router); // Use Vue Router
app.mount('#app')
