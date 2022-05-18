<template>
    <div>
        <!--        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Корзина {{basketCount}}</button>-->
        <!-- Button trigger modal -->
        <a :href="url" class="btn btn-light btn btn-sm">Корзина
            <span class="count" >{{basketCount}}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3"
                 viewBox="0 0 16 16">
                <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
        </a>

        <div id="openModal" class="modalDialog">
            <div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Корзина</h5>
                    <a href="#close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">
                    <p v-if="!basketCount">Пусто</p>
                    <ul class="list-group list-group-flush">
                        <li v-for="(basket, index) in baskets" :key="index" class="list-group-item">
                            <div class="row">
                                <div class="col-11">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ basket.product.title }}</h5>
                                        <small style="color: #2196f3">{{ basket.product.price }} руб.</small>
                                    </div>
                                    <small style="color: #f8463f">{{ basket.product.brand.name }}</small>
                                </div>
                                <div class="col-1">
                                    <button @click="remove(index)" class="btn btn-outline-danger btn-sm" type="submit">×</button>
                                </div>
                            </div>

                        </li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button v-if="basketCount" disabled type="button" class="btn btn-light">Итог: {{ basketPrices }}</button>
                    <a href="#close">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import {mapGetters, mapActions, mapMutations} from 'vuex';

export default {
    name: "BasketComponent",
    data() {
        return {
            url: "#openModal",
        }
    },
    computed: mapGetters(['baskets', 'basketCount', 'basketPrices']),
    // methods: mapActions(['fetchBaskets']), mapMutations(['deleteBasket'])
    methods: {
        ...mapActions(['fetchBaskets']),
        ...mapMutations(['deleteBasket']),
        remove(index){
            this.deleteBasket(index)
        }

    },
    async mounted() {
        if (this.$root.auth == 'false'){
            this.url = '/auth'
        }else {
            await this.fetchBaskets()
        }
    },
}
</script>

<style scoped>

a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}

.count{
    background: #f8463f;
    border-radius: 100%;
    width: 18px;
    height: 18px;
    display: block;
    font-size: 11px;
    color: #fff;
    line-height: 18px;
    text-align: center;
    position: absolute;
    margin-left: 62px;
    margin-top: -37px;
}

.modalDialog {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 99999;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    display: none;
    pointer-events: none;
    overflow: auto;
}

.modalDialog:target {
    display: block;
    pointer-events: auto;
}

.modalDialog > div {
    width: 700px;
    position: relative;
    margin: 10% auto;
    border-radius: .3rem;
    background: #fff;
    background: -moz-linear-gradient(#fff, #999);
    background: -webkit-linear-gradient(#fff, #999);
    background: -o-linear-gradient(#fff, #999);
}

.close {
    line-height: 25px;
    position: absolute;
    right: 16px;
    text-align: center;
    top: 17px;
    text-decoration: none;
    font-weight: 100;
    color: #000;
    font-size: 26px;
}


</style>
