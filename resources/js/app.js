import './bootstrap';

import 'bootstrap-icons/font/bootstrap-icons.css';

import {createApp} from 'vue';

import App from './App.vue';

import router from './routes';

createApp(App).use(router).mount("#app");
