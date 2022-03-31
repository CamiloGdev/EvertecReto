require('./bootstrap');

// window.Vue = require('vue').default;

import { createApp } from 'vue'
import InputFile from './components/InputFile.vue'
import ProductsList from "./components/store/ProductsList";

window.Vue = require('vue').default;

const app = createApp({
   /*root component options*/
  components: {
    InputFile,
    ProductsList,
  }
})

app.mount('#app')
