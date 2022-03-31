require('./bootstrap');

// window.Vue = require('vue').default;

import {createApp, watchEffect} from 'vue'
import {state} from "./store/state";
import InputFile from './components/InputFile.vue'
import ProductsList from "./components/shop/ProductsList.vue";

import Cart from "./components/cart/Cart.vue";
import CartIcon from "./components/cart/CartIcon";

const app = createApp({
   /*root component options*/
  components: {
    InputFile,
    ProductsList,
    Cart,
    CartIcon
  },
  setup() {
    if (localStorage.getItem('cart')) {
      state.cart = JSON.parse(localStorage.getItem('cart'));
    }

    watchEffect (() => {
      localStorage.setItem('cart', JSON.stringify(state.cart))
    })
    return{state}
  }
})

app.mount('#app')
