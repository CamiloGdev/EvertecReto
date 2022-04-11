<template>

  <div class="card card-nav-tabs">
    <h4 class="card-header card-header-warning">Shopping cart</h4>
    <div class="card-body">

      <table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Item</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
          <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody id="items">
        <Item
            v-for="item in state.cart" :key="item.id"
            :item="item"
        />
        </tbody>
        <tfoot>
        <tr id="footer-cart">
          <th scope="row" colspan="5" v-if="Object.keys(state.cart).length === 0">Empty cart - start shopping!</th>
          <Footer v-else/>
        </tr>
        </tfoot>
      </table>

<!--      <a :href="`/orders`" class="btn btn-primary" id="to-buy">To buy</a>-->
      <button class="btn btn-primary" id="to-buy" @click="toBuy" v-if="!(Object.keys(state.cart).length === 0)">To buy</button>

    </div>
  </div>
</template>

<script>
import {state} from '../../store/state.js'
import Item from './Item'
import Footer from './Footer'

export default {
  name: "Cart",
  components: {Item, Footer},

  setup() {

    const toBuy = () => {

      axios.post('/api/store-order', {
        cart: state.cart,
      })
          .then(function (response) {
            window.location.assign('/orders');
            state.cart = {}
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    }
    return {state, toBuy}
  }
}
</script>