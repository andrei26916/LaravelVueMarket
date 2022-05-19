<template>
    <div>
      <BannerComponent/>
        <h2>{{this.category.name}}</h2>
        <div class="content">
            <ProductsComponent :products="this.category.products" />
        </div>

    </div>
</template>

<script>
    import ProductsComponent from '../components/ProductsComponent';
    import BannerComponent from '../components/BannerComponent';
    export default {
        name: "Category",
        components: {
            ProductsComponent, BannerComponent
        },
        data(){
          return {
              category: {}
          }
        },

        watch: {
          '$route.params.id': {
            immediate: true,
            handler() {
                // axios.get('/api/category/' + $route.params.id).then(response => (this.category = response.data))
              //получение данных с API
            }
          }
        },
        mounted(){
            axios.get('/api/category/' + this.$route.params.id).then(response => (this.category = response.data))
        }
    }
</script>

<style scoped>

</style>
