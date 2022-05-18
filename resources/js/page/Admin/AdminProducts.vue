<template>
  <div>
    <h1>Товары <el-button type="success" size="mini"><i class="el-icon-shopping-cart-full"></i> Создать</el-button></h1>
    <ProductListComponent :products="this.products"/>
  </div>
</template>

<script>
import ProductListComponent from "../../components/ProductListComponent";
import axios from "axios";

export default {
  name: "AdminProducts",
  components: {ProductListComponent},
  data(){
    return{
      products: {}
    }
  },
  mounted(){
    axios.get('http://127.0.0.1:8000/api/products')
        .then(response => (this.products = response.data))
  },
}
</script>

<style scoped>

</style>