require('./bootstrap');

// window.Vue = require('vue').default;

import { createApp } from 'vue'
import InputFile from './components/InputFile.vue'
import ProductsList from "./components/store/ProductsList";

window.Vue = require('vue').default;

const app = createApp({
  /* root component options */
  el: '#app',
  components: {
    InputFile,
    ProductsList,
  }
})

/*app
    .component('ProductsList',ProductsList)
    .component('InputFile',InputFile)*/

app.mount('#app')
