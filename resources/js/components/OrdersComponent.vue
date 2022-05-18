<template>

    <div>
        <div class="order" v-for="order in orders">
            <h3>Заказ № {{order.number}}</h3>

            <el-steps :active="order.status" finish-status="success" style="margin-bottom: 20px;">
                <el-step title="Собран"></el-step>
                <el-step title="В пути"></el-step>
                <el-step title="Получен"></el-step>
            </el-steps>

            <div class="orderItem">
                <div class="product" v-for="product in order.products">
                    <div class="img">
                        <el-image
                                style="width: 100px; height: 100px"
                                :src="product.image"></el-image>
                    </div>
                    <div class="info">
                        <p>{{product.title}}</p>
                        <p style="font-size: 12px; font-weight: bold">{{product.price}} ₽</p>
                        <router-link :to="{name: 'product', params: {id: product.id}}">
                            <el-button size="mini" type="info">Оставить отзыв</el-button>
                        </router-link>
                    </div>
                </div>
            </div>

            <div class="orderInfo">
                <p>Дата оформления: <span>{{order.date}}</span></p>
                <h4>Способ оплаты:</h4>
                <p>Картой онлайн 4 045 ₽ за 3 товара, оплачено</p>
                <h4>Способ получения</h4>
                <p>Адрес: <span>{{order.recipientAddress}}</span></p>
                <p>Получатель: <span>{{order.recipient}}, тел. {{order.recipientPhone}}</span></p>
                <p>Дата доставки: <span>12–13 марта доставка Яндекса: Стош Андрей, тел. +7 999 684-47-60</span></p>
                <p>Срок хранения: <span>3 дня</span></p>
                <p>Стоимость доставки: <span> 349 ₽</span></p>
                <div>
                    <el-button style="margin-top: 12px;" type="success" >Чат с продавцом</el-button>
                    <el-button style="margin-top: 12px;" type="warning" >Повторить</el-button>
                    <el-button style="margin-top: 12px;" type="info" >Отменить</el-button>
                </div>
            </div>

        </div>
    </div>


</template>

<script>
    export default {
        name: "OrdersComponent",
        data(){
            return {
                orders: [
                    {
                        id: 1,
                        number: '15374042',
                        status: 1,
                        products: [
                            {id: 1, price: 350, title: 'Проектор XGIMI Elfin', rate: 2.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                            {id: 2, price: 350, title: 'BENQ Проектор Benq Mw632st', rate: 4.9, ball: 540, image: 'https://avatars.mds.yandex.net/get-marketpic/5487168/picf79c4a3690aa28611a52237a58100d27/200x200'},
                            {id: 3, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                        ],
                        recipient: 'Стош Андрей',
                        recipientPhone: '+7 999 684-67-61',
                        recipientAddress: 'Пункт выдачи заказов PickPoint. Иркутск, Свердлова ул., д. 36',
                        date: '4 января, 18:54'
                    },
                    {
                        id: 2,
                        number: '15374043',
                        status: 3,
                        products: [
                            {id: 4, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                            {id: 5, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                            {id: 6, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                        ],
                        recipient: 'Иванов Андрей',
                        recipientPhone: '+7 999 867-77-65',
                        recipientAddress: 'Пункт выдачи заказов PickPoint. Иркутск, Свердлова ул., д. 36',
                        date: '9 декабря 2021, 18:54'
                    }
                ]
            }
        },
        methods: {
            repeat (id){

            },
            cancel (id){

            },
            sellerChat (){

            }
        }
    }
</script>

<style scoped>
    .order{
        max-width: 850px;
        display: flow-root;
        border: 1px solid #e7e7e7;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 1.5em;
    }

    .orderItem{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        float: left;
    }

    .order h3{
        text-align: left;
        font-weight: normal;

    }

    .product{
        display: flex;
        width: 400px;
        justify-content: flex-start;
        margin-bottom: 1em;
    }
    .info{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-content: flex-start;
        align-items: flex-start;
        margin-left: 0.5em;
    }

    .info p{
        margin: 0 0 0.5em;
        padding: 0;
    }
    .orderInfo{
        display: flex;
        width: 400px;
        flex-direction: column;
        align-content: flex-start;
        align-items: flex-start;
        text-align: left;
    }

    .orderInfo p{
        margin: 0 0 0.8em;
        padding: 0;
        color: #727272;
        text-align: justify;
    }

    .orderInfo p span{
        color: #2c3e50;
    }

    .orderInfo h4{
        margin: 0 0 1em;
        padding: 0;
    }
</style>