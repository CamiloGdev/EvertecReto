<template>
  <span class="notification" v-if="totalCount > 0">{{ totalCount }}</span>
</template>

<script>
import {state} from '../../store/state.js'
import {computed} from "vue";

export default {
  name: "CartIcon",
  setup() {
    const totalCount = computed (() => Object.values(state.cart).reduce((acc, {addCount}) => acc + addCount, 0))
    return {state, totalCount}
  }
}
</script>