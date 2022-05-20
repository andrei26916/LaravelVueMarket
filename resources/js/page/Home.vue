<template>
    <div>
        <BannerComponent/>
      <div v-for="(category,key) in this.categories ">
        <div class="content">
          <h1 v-if="key === 0" style="margin-top: 0;">{{ category.name }}</h1>
          <h1 v-else>{{ category.name }}</h1>
          <ProductsComponent :products="category.products"/>
        </div>
      </div>
    </div>
</template>

<script>
import ProductsComponent from '../components/ProductsComponent';
import BannerComponent from '../components/BannerComponent';
import axios from "axios";

export default {
    name: "Home",
    components: {
        ProductsComponent, BannerComponent
    },
    data(){
      return {
        categories: [],
      }
    },
    mounted() {
      axios.get('http://10.100.3.232/api/products/category')
          .then(response => (this.categories = response.data))
    }
}
</script>

<style scoped>
  h1{
    margin-top: 10vh;
    text-align: left;
  }

</style>
