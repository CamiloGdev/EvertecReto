<template>
  <tr>
    <th scope="row">{{item.id}}</th>
    <td>{{item.name}}</td>
    <td>{{item.price}}</td>
    <td>{{item.addCount}}</td>
    <td>
      <button class="btn btn-info btn-sm btn-round" @click="addCountProduct(item)">
        +
      </button>
      <button class="btn btn-danger btn-sm btn-round" @click="decreaseCountProduct(item)">
        -
      </button>
    </td>
    <td>${{item.price * item.addCount}}</td>
  </tr>
</template>

<script>
import {state} from '../../store/state.js'

export default {
  name: "Item",
  props: ['item'],
  setup() {
    const addCountProduct = (item) => {
      item.addCount = state.cart[item.id].addCount + 1
      state.cart[item.id] = item
    }
    const decreaseCountProduct = (item) => {
      item.addCount = state.cart[item.id].addCount - 1
      if (state.cart[item.id].addCount === 0) {
        delete state.cart[item.id]
      } else {
        state.cart[item.id] = item
      }
    }
    return {state, addCountProduct, decreaseCountProduct}
  }
}
</script>