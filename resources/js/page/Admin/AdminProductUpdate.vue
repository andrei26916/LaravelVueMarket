<template>
    <div>
    <h1>Изменить</h1>
    <ProductsUpdateComponent :product="this.product"/>
    </div>
</template>

<script>
import ProductsUpdateComponent from "../../components/ProductsUpdateComponent";
import axios from "axios";
export default {
    name: "AdminProductUpdate",
    components: {ProductsUpdateComponent},
    data(){
        return {
            product: {}
        }
    },
    mounted() {
        axios.get('/api/product/' + this.$route.params.id)
            .then(response => (this.product = response.data))
    }
}
</script>

<style scoped>

</style>
