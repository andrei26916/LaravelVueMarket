<template>
    <div>
        <h1>{{product.title}}</h1>
        <div class="product">
            <div class="images">
                <el-carousel indicator-position="outside" style="width: 500px;">
                    <el-carousel-item v-for="image in product.images" :key="image.id">
                        <el-image :src="image.src" fit="scale-down"></el-image>
                    </el-carousel-item>
                </el-carousel>
            </div>

            <div class="info">
                <div class="prices">
                    <div class="card">
                        <p>Рейтинг:</p>
                        <el-rate v-model="product.rate" disabled />
<!--                        <p style="margin-right: 20px" >{{product.rate}}</p>-->
<!--                        <p style="color: #00000066 ">{{product.ball}} баллов на Плюс</p>-->
                    </div>
                    <br>
                    <div class="card">
                        <h2>{{product.price}} ₽</h2>
                        <el-button v-if="!isCheckFavorites(this.product)" @click="submitFavorites"><i class="el-icon-collection-tag"></i> Избранное</el-button>
                        <el-button v-else @click="removeFavorites"><i class="el-icon-collection-tag"></i> Удалить</el-button>
                        <el-button v-if="!isCheck(this.product)" type="warning" @click="submit"><i class="el-icon-shopping-cart-full"></i> В корзину</el-button>
                        <el-button v-else type="danger" @click="remove"><i class="el-icon-shopping-cart-full"></i>Удалить</el-button>
                    </div>
                </div>
                <el-tabs v-model="activeName">
                    <el-tab-pane label="Описание" name="first">
                        <p>{{product.description}}</p>
                    </el-tab-pane>
<!--                    <el-tab-pane label="Характеристики" name="second">Config</el-tab-pane>-->
                </el-tabs>
            </div>

        </div>
        <FeedbacksComponent :feedbacks="product.feedbacks"/>



    </div>
</template>

<script>
    import FeedbacksComponent from "./FeedbacksComponent";
    import {mapGetters, mapMutations} from "vuex";
    export default {
        name: "ProductComponent",
        props: ['product'],
        components: {
          FeedbacksComponent,
        },
        data(){
            return {
                activeName: 'first',
            }
        },
        methods: {
            ...mapMutations(['createBasket', 'removeBasket', 'createFavourites', 'removeFavourites']),
            ...mapGetters(['allBasket', 'allFavourites']),
            submit() {
                this.createBasket(this.product)
            },
            submitFavorites() {
                this.createFavourites(this.product)
            },
            remove() {
                this.removeBasket(this.product.id);
            },
            removeFavorites() {
                this.removeFavourites(this.product.id);
            },
            isCheck(product) {
                let result = false;
                this.allBasket().forEach(function (item) {
                    if (item.id === product.id) {
                        result = true;
                    }
                });
                return result;
            },
            isCheckFavorites(product) {
                let result = false;
                this.allFavourites().forEach(function (item) {
                    if (item.id === product.id) {
                        result = true;
                    }
                });
                return result;
            }
        }
    }
</script>

<style scoped>

    div h1{
        text-align: left;
    }

    .product{
        width: 100%;
        display: flex;
        border: 1px solid #e7e7e7;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 1.5em;

    }

    .images{
        width: 570px;
        margin-right: 50px;
    }

    .info{
        display: flex;
        flex-direction: column;
    }

    .prices{
        margin-bottom: 24px;
        box-shadow: 0 8px 24px rgb(0 0 0 / 12%);
        border-radius: 11px;
        padding: 16px 12px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        max-width: 515px;
    }

    .prices .card{
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center
    }

    .prices .card h2{
        width: 200px;
        text-align: left;
        background: #f6f6f6;
        border-radius: 5px;
        padding: 10px;
        margin: 0 20px 0 0;
    }

    .prices .card p{
        color: #000000a6;
        font-size: 15px;
        margin: 0 4px 0 0;

    }

    .info p{
        text-align: left;
        font-size: 16px;
        line-height: 1.5;
    }

    .el-carousel__item h3 {
        color: #475669;
        font-size: 14px;
        opacity: 0.75;
        line-height: 250px;
        margin: 0;
    }

    .el-carousel__item:nth-child(2n) {
        background-color: #99a9bf;
    }

    .el-carousel__item:nth-child(2n+1) {
        background-color: #d3dce6;
    }
</style>
