
import { createApp } from 'vue';
import App from './vue/App.vue';
import router from './vue/router/index';

import './styles/app.css';

// Mount the vue application
const app = createApp(App);
app.use(router);
app.mount('#app');