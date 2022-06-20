<template>

    <div>
        <div class="order" v-for="order in orders">
            <h3>Заказ № {{order.id * 113}}</h3>

            <el-steps :active="order.status" finish-status="success" style="margin-bottom: 20px;" v-if="order.status !== 5">
                <el-step title="Собран"></el-step>
                <el-step title="В пути"></el-step>
                <el-step title="Получен"></el-step>
            </el-steps>
            <div v-else>
                <h2>Заказ отменен</h2>
            </div>

            <div class="orderItem">
                <div class="product" v-for="product in order.data">
                    <div class="img">
                        <el-image v-for="image in product.images" :key="image.id"
                                  style="width: 100px; height: 100px"
                                  :src="image.src"></el-image>
                    </div>
                    <div class="info">
                        <p>{{product.title}}</p>
                        <p style="font-size: 12px; font-weight: bold">{{product.price}} ₽ x {{product.count}}</p>
                    </div>
                </div>
            </div>

            <div class="orderInfo">
                <p>Дата оформления: <span>{{(new Date(order.created_at)).toLocaleDateString()}}</span></p>
                <h4>
                    Способ оплаты:
                </h4>
                <p>
                    <span v-if="order.payment">Наличные</span>
                    <span v-else >Картой онлайн</span>
                    {{ order.price }} ₽ за {{order.data.length}} товара</p>
                <h4>Способ получения</h4>
                <p>Адрес: <span>{{order.recipient_address}}</span></p>
                <p>Получатель: <span>{{order.recipient}}, тел. {{order.recipient_phone}}</span></p>
                <p>Дата доставки: <span>5–13 дней</span></p>
                <p>Срок хранения: <span>3 дня</span></p>
                <!--                <p>Стоимость доставки: <span> 349 ₽</span></p>-->
                <div>
                    <el-button style="margin-top: 12px;" type="success" v-if="order.status !== 5">Чат с покупателем</el-button>
                    <el-button style="margin-top: 12px;" type="warning" @click="status(order.id)" v-if="order.status < 3">Изменить статус</el-button>
                    <el-button style="margin-top: 12px;" type="info" @click="cancel(order.id)" v-if="order.status < 3">Отменить</el-button>
                </div>
            </div>

        </div>
    </div>


</template>

<script>
export default {
    name: "OrdersListComponents",
    data(){
        return {
            orders: [
                // {
                //     id: 1,
                //     number: '15374042',
                //     status: 1,
                //     products: [
                //         {id: 1, price: 350, title: 'Проектор XGIMI Elfin', rate: 2.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                //         {id: 2, price: 350, title: 'BENQ Проектор Benq Mw632st', rate: 4.9, ball: 540, image: 'https://avatars.mds.yandex.net/get-marketpic/5487168/picf79c4a3690aa28611a52237a58100d27/200x200'},
                //         {id: 3, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                //     ],
                //     recipient: 'Стош Андрей',
                //     recipientPhone: '+7 999 684-67-61',
                //     recipientAddress: 'Пункт выдачи заказов PickPoint. Иркутск, Свердлова ул., д. 36',
                //     date: '4 января, 18:54'
                // },
                // {
                //     id: 2,
                //     number: '15374043',
                //     status: 3,
                //     products: [
                //         {id: 4, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                //         {id: 5, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                //         {id: 6, price: 350, title: 'Проектор XGIMI Elfin', rate: 4.5, ball: 540, image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'},
                //     ],
                //     recipient: 'Иванов Андрей',
                //     recipientPhone: '+7 999 867-77-65',
                //     recipientAddress: 'Пункт выдачи заказов PickPoint. Иркутск, Свердлова ул., д. 36',
                //     date: '9 декабря 2021, 18:54'
                // }
            ]
        }
    },
    methods: {
        status (id){
            axios.post('/api/order/' + id + '/status').then(response => (console.log(response.data)));
            this.orders.forEach((element) => {
                if (element.id === id){
                    if (element.status < 3){
                        element.status += 1;
                    }
                }
            })

        },
        cancel (id){
            axios.post('/api/order/' + id + '/cancel').then(response => (console.log(response.data)));
            this.orders.forEach((element) => {
                if (element.id === id){
                    element.status = 5;
                }
            })
        },
        sellerChat (){

        }
    },
    mounted() {
        axios.get('/api/orders').then(response => (this.orders = response.data))
    }
}
</script>

<style scoped>
.order{
    max-width: 1500px;
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
    width: 500px;
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
    max-width: 600px;
    width: 100%;
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
