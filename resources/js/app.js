require('./bootstrap');

// window.Vue = require('vue').default;

import { createApp } from 'vue'
import InputFile from './components/InputFile.vue'

window.Vue = require('vue').default;

const app = createApp({
  /* root component options */
  el: '#app',
  components: {
    InputFile
  }
})

app.mount('#app')
