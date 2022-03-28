<template>
  <div class="container-fluid">

    <nav class="navbar navbar-expand-lg bg-white">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <a class="navbar-brand" href="#">Search</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <form class="form-inline ml-auto">
            <div class="form-group no-border">
              <input
                  type="search"
                  class="form-control"
                  style="width: 300px"
                  placeholder="Search by name, product reference..."
                  v-model="consult"
                  @keyup="searchProducts"
              >
            </div>
          </form>
        </div>

      </div>
    </nav>

    <div class="row">

      <div class="col-md-3" v-for="product in products" :key="product">
        <a href="#">
          <div class="card" style="width: 15rem;">
            <img class="card-img-top" :src="product.images[0].url_image" alt="Card image cap">
            <div class="card-body pt-0">
              <div class="text-center">
                <h5 class="h3 font-weight-bold" v-text="product.name"></h5>
                <h5 class="h3" v-text="'$ ' + product.price"></h5>
                <button type="button" class="btn btn-primary btn-sm btn-round" @click="add(product)">
                  <i class="material-icons">shopping_cart</i> Add to cart
                </button>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>

  </div>
</template>

<script>
import {useStore} from 'vuex'

export default {
  name: "ProductsList",
  created() {
    this.getProducts();
  },
  setup(){
    const store = useStore()
    const add = product => {
      store.dispatch('addCart', product)
    }
    return {add}
  },

  data: () => ({
    products: [],
    consult: '',
    setTimeoutConsult: ''
  }),

  methods: {

    async getProducts() {
      try {
        const resProducts = await axios.get('/api/get-products', {
          params: {
            consult: this.consult
          }
        })
          this.products = resProducts.data
          console.log(resProducts.data)
      } catch (error) {
        console.log(error)
      }
    },

    searchProducts() {
      clearTimeout(this.setTimeoutConsult)
      this.setTimeoutConsult= setTimeout(this.getProducts, 360)
    }
  },
}

</script>

<style scoped>

</style>