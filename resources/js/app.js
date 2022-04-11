require('./bootstrap');

// window.Vue = require('vue').default;

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

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
    if (localStorage.getItem('cartUser_' + window.app.user)) {
      state.cart = JSON.parse(localStorage.getItem('cart'));
    }

    watchEffect (() => {
      localStorage.setItem('cartUser_' + window.app.user, JSON.stringify(state.cart))
    })
    return{state}
  }
})

app.use(VueSweetalert2)
app.mount('#app')
