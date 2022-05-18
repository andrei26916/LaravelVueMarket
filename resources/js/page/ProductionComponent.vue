<template>
    <div class="container">
        <div v-if="loading" style="display: flex;align-items: center;justify-content: center;margin-top: 200px;">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="row">
            <div v-for="(product, key) in products" :key="product.id" class="col-sm-4" style="padding: 10px;">
                <div class="card">
                    <img src="/img/header.jpeg" class="card-img-top" alt="...">
                    <span class="ribbon1"><span>{{product.brand.name}}</span></span>
                    <div class="card-body">
                        <h5>
                            {{product.price}} руб.
                        </h5>
                        <h6>{{product.title}}</h6>
                        <p class="card-text" style="color: #9c9c9c;font-size: 12px;">{{product.description}}</p>
                        <a href="javascript:" @click="submit(product)" class="btn btn-success" style="width: 100%;text-align: center;">В корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapMutations} from 'vuex';
export default {
    name: "ProductionComponent",
    props: ['data'],
    watch:{
        '$route' (to, from){
           this.show();
        }
    },
    data() {
        return {
            products: [],
            loading: true,
            errored: false,
        }
    },
    mounted() {
        this.show()
    },
    methods: {
        ...mapMutations(['createBasket']),
        async submit(product){
            if (this.$root.auth == 'false'){
                Vue.$toast("Для добавления в корзину, авторизуйтесь", {
                    timeout: 4000,
                });
                return;
            }
            var basket;
            await axios
                .post('/api/basket', {
                    product_id: product.id,
                })
                .then(response => (basket = response.data));
            basket['product'] = product
            this.createBasket(basket)
        },
        async show(){
            if (this.$route.params.id){
                axios
                    .get('/api/products' + '?category=' + this.$route.params.id)
                    .then(response => (this.products = response.data))
                    .catch(error => {
                        console.log(error);
                        this.errored = true;
                    })
                    .finally(() => (this.loading = false));
                return;
            }
            axios
                .get('/api/products')
                .then(response => (this.products = response.data))
                .catch(error => {
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => (this.loading = false));
        }
    },

}
</script>

<style scoped>

h5{
    color: #2196f3;
}

.ribbon1 {
    position: absolute;
    top: -6.1px;
    right: 10px;
}
.ribbon1:after {
    position: absolute;
    content: "";
    width: 0;
    height: 0;
    border-left: 53px solid transparent;
    border-right: 39px solid transparent;
    border-top: 10px solid #F8463F;
}
.ribbon1 span {
    position: relative;
    display: block;
    text-align: center;
    background: #F8463F;
    font-size: 14px;
    line-height: 1;
    padding: 12px 8px 10px;
    border-top-right-radius: 8px;
    width: 90px;
    color: #fff;
    font-size: 13px;
    text-align: center;
}
.ribbon1 span:before, .ribbon1 span:after {
    position: absolute;
    content: "";
}
.ribbon1 span:before {
    height: 6px;
    width: 6px;
    left: -6px;
    top: 0;
    background: #f73d33;
}
.ribbon1 span:after {
    height: 6px;
    width: 8px;
    left: -8px;
    top: 0;
    border-radius: 8px 8px 0 0;
    background: #C02031;
}

</style>
