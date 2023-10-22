require('./bootstrap');
 import { createApp } from 'vue';

 import app from './components/App.vue';

 createApp(app).mount('#app');

 axios.defaults.baseURL = `${window.location.origin}`;