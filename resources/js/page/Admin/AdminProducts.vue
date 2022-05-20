<template>
  <div>
    <h1>Товары
        <router-link :to="{name: 'AdminProduct'}">
            <el-button type="success" size="mini">
                <i class="el-icon-shopping-cart-full"></i> Создать
            </el-button>
        </router-link>
    </h1>
    <ProductListComponent :products="this.products"/>
  </div>
</template>

<script>
import ProductListComponent from "../../components/ProductListComponent";
import axios from "axios";
import ProductComponent from "../../components/ProductComponent";
import ProductsComponent from "../../components/ProductsComponent";

export default {
  name: "AdminProducts",
  components: {ProductsComponent, ProductListComponent},
  data(){
    return{
      products: []
    }
  },
  mounted() {
    axios.get('/api/products')
        .then(response => (this.products = response.data))
    console.log(this.products)
  }
}
</script>

<style scoped>

</style>
