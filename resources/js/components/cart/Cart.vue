<template>
  <div class="my-5">
    <h4>Shopping cart</h4>
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
  </div>
</template>

<script>
import {state} from '../../store/state.js'
import Item from './Item'
import Footer from './Footer'

export default {
  name: "Cart",
  components: {Item, Footer},
  setup(){
    return {state}
  }
}
</script>