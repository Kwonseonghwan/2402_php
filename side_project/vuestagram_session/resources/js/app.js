require('./bootstrap');

import { CreateApp, createApp } from 'vue';
import AppComponent from '../components/AppComponent.vue';
import store from './store';
import router from './router';

createApp({
    components: {
        AppComponent,
    }
})
.use(store)
.use(router)
.mount('#app');