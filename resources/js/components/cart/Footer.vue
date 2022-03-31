<template>

  <th scope="row" colspan="2">Total products</th>
  <td></td>
  <td>{{totalCount}}</td>
  <td>
    <button class="btn btn-danger btn-sm" id="empty-cart" @click="emptyCart">
      empty cart
    </button>
  </td>
    <td class="font-weight-bold">$ <span>{{totalPrice}}</span></td>
</template>

<script>
import {state} from '../../store/state.js'
import {computed} from "vue";

export default {
  name: "Footer",
  setup() {
    const totalCount = computed (() => Object.values(state.cart).reduce((acc, {addCount}) => acc + addCount, 0))
    const totalPrice = computed (() => Object.values(state.cart).reduce((acc, {addCount, price}) => acc + (addCount * price), 0))
    const emptyCart = () => state.cart = {}
    return {state, totalCount, totalPrice, emptyCart}
  }
}
</script>