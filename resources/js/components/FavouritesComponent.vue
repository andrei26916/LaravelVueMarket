<template>
    <div>
        <div class="c" v-if="count">
            <div class="card" v-for="favorite in favourites()">
                <el-image v-for="image in favorite.images" :key="image.id"
                        style="width: 100%; height: 100%"
                        :src="image.src"></el-image>
                <h3>3 050 <span style="font-size: 16px">₽</span> </h3>
<!--                <span style="color: #9e9e9e;font-size: 13px;">{{favorite.ball}}&nbsp;баллов на Плюс</span>-->
                <el-rate v-model="favorite.rate" />
                <p>{{favorite.title}}</p>
                <div style="display: flex;flex-direction: column;align-items: flex-end;">
                    <el-button v-if="!isCheck(favorite)" type="warning" @click="submit(favorite)">В корзину </el-button>
                    <el-button v-else type="danger" @click="removeBaskets(favorite.id)">Убрать из корзины </el-button>
                    <el-button type="info" @click="remove(favorite.id)">Убрать из избранного</el-button>
                </div>

            </div>
        </div>
        <p v-else>тут пока ничего нет</p>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapMutations} from 'vuex';
    export default {
        name: "FavouritesComponent",
        data(){
            return {
                favorites: [
                  {id: 1, categoryId: 1, price: 1350, title: 'Проектор XGIMI Elfin', rate: 2.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                  {id: 2, categoryId: 2, price: 2350, title: 'BENQ Проектор Benq Mw632st', rate: 4.9, ball: 540, image: 'https://avatars.mds.yandex.net/get-marketpic/5487168/picf79c4a3690aa28611a52237a58100d27/200x200'},
                ]
            }
        },
        // computed: mapGetters(['allFavourites', 'countFavourites']),
        methods: {
            ...mapMutations(['removeFavourites', 'createBasket', 'removeBasket']),
            ...mapGetters(['allFavourites', 'countFavourites', 'allBasket']),
            count(){
                return this.countFavourites();
            },
            favourites(){
                return this.allFavourites()
            },
            submit(product){
                this.createBasket(product)
            },
            remove(id) {
                this.removeFavourites(id)
            },
            removeBaskets(id){
                this.removeBasket(id);
            },
            isCheck(favorite){
                let result = false;
                this.allBasket().forEach(function (item) {
                    if (item.id === favorite.id){
                        result = true;
                    }
                });
                return result;
            },
        },
    }
</script>

<style scoped>
    .card{
        width: 207px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        margin-right: 20px;
    }

    .card img{
        width: 100%;
        margin: 20px 0;
    }

    .card p{
        font-size: 15px;
        color: #626262;
    }

    .card h3{
        padding: 0;
        margin: 0 0 5px;
    }

    .card p{
        margin: 10px 0;
    }

    .card button{
        margin-top: 10px;
        width: 100%;
    }

    .c{
        display: flex;
        align-items: flex-end;
        height: auto;
        position: absolute;
        flex-wrap: wrap;
        width: 1440px;
        justify-content: flex-start;
    }
</style>
