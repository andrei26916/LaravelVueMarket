<template>
    <div>
        <div v-if="countBasket" style="display: flex; justify-content: space-between;align-items: flex-start;">
            <div>
                <div class="basket" v-for="basket in allBasket">
                    <div class="img">
                        <el-image
                                style="width: 100px; height: 100px"
                                :src="basket.image"></el-image>
                    </div>
                    <div class="info">
                        <p>{{basket.title}}</p>
                        <div style="width: 300px; color: #999;">
                            <span v-if="!isCheck(basket)" @click="submit(basket)"  style="padding-right: 20px"><i class="el-icon-collection-tag"></i> Избранное</span>
                            <span v-else @click="remove(basket.id)"  style="padding-right: 20px"><i class="el-icon-collection-tag"></i> Убрать из избранное</span>
                            <span @click="removeBasket(basket.id)"><i class="el-icon-delete"></i> Удалить</span>
                        </div>
                    </div>
                    <div class="price">
                        <h3>{{basket.price * basket.count}} ₽</h3>
                        <el-input-number size="mini" @change="value => handleChange(value, basket.id)" :value="basket.count" :min="1" :max="10"></el-input-number>
                    </div>
                </div>

            </div>

            <div class="information">
                <el-button @click="$router.push({name: 'order'})" type="warning">Перейти к оформлению</el-button>
                <div class="i">
                    <h4> Итого</h4>
                    <h4> {{resultBasket().prices}} ₽</h4>
                </div>
                <div class="i">
                    <h5> Всего: {{resultBasket().productCount}} товара</h5>
                    <h5> {{resultBasket().prices}} ₽</h5>
                </div>
            </div>

        </div>

        <p v-else>Тут пока ничего нет</p>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapMutations} from 'vuex';
    export default {
        name: "BasketComponent",
        data() {
            return {

            }
        },
        computed: mapGetters(['allBasket', 'countBasket', 'countFavourites']),
        methods: {
            ...mapMutations(['removeBasket', 'updateCountProduct', 'createFavourites', 'removeFavourites']),
            ...mapGetters(['resultBasket', 'allFavourites']),
            handleChange(value, id){
                console.log(value);
                this.updateCountProduct({value, id})
            },
          submit(product){
            this.createFavourites(product)
          },
          remove(id){
            this.removeFavourites(id);
          },
          isCheck(product){
            let result = false;
            this.allFavourites().forEach(function (item) {
              if (item.id === product.id){
                result = true;
              }
            });
            return result;
          },
        }
    }
</script>

<style scoped>
    .basket{
        display: flex;
        width: 850px;
        justify-content: space-around;
        border-bottom: 1px solid #e7e7e7;
        padding-bottom: 20px;
        margin-bottom: 20px;

    }

    .basket .info{
        width: 200px;
        display: flex;
        flex-wrap: nowrap;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .price{
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: space-between;
    }

    .information{
        width: 400px;
        display: flex;
        flex-direction: column;
        align-items: stretch;
    }
    .i{
        display: flex;
        justify-content: space-between;
    }

    h4{
        /*margin-top: 5px;*/
        margin: 10px 0 0 0;
    }

    .info span{
        cursor: pointer;
    }
</style>