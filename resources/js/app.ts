// import './bootstrap';

import { createApp } from 'vue';
import router from './router';
import IndexPageVue from './pages/IndexPage.vue';
import AppVue from './App.vue';
// Create App
const app = createApp(AppVue);

app.component('index-page', IndexPageVue);

// Vue Router
app.use(router);

// Mount App
app.mount('#app');
