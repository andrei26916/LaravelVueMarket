<template>
    <div>
        <BannerComponent/>
        <h3>Результаты поиска по запросу "{{this.$route.query.q}}"</h3>
        <div class="content">
            <ProductsComponent :products="this.products" />
        </div>

    </div>
</template>

<script>
import ProductsComponent from "../components/ProductsComponent";
import BannerComponent from "../components/BannerComponent";

export default {
    name: "Search",
    data(){
        return {
            products: {}
        }
    },
    components: {
        ProductsComponent, BannerComponent
    },
    watch: {
        '$route.query': {
            immediate: true,
            handler() {
                axios.get('/api/search/' + this.$route.query.q)
                    .then(response => (this.products = response.data))
            }
        }
    }
}
</script>

<style scoped>

</style>
