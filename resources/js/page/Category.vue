<template>
    <div>
      <BannerComponent/>
      <div class="content">
        <ProductsComponent :products="this.products" />
      </div>
    </div>
</template>

<script>
    import ProductsComponent from '../components/ProductsComponent';
    import BannerComponent from '../components/layouts/BannerComponent';
    export default {
        name: "Category",
        components: {
            ProductsComponent, BannerComponent
        },
        data(){
          return {
            products: [
              {
                id: 1,
                categoryId: 1,
                price: 1350,
                title: 'Проектор XGIMI Elfin',
                rate: 2.5,
                ball: 540,
                image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'
              },
              {
                id: 2,
                categoryId: 2,
                price: 2350,
                title: 'BENQ Проектор Benq Mw632st',
                rate: 4.9,
                ball: 540,
                image: 'https://avatars.mds.yandex.net/get-marketpic/5487168/picf79c4a3690aa28611a52237a58100d27/200x200'
              },
              {
                id: 3,
                categoryId: 3,
                price: 3350,
                title: 'Проектор XGIMI Elfin',
                rate: 4.5,
                ball: 540,
                image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'
              },
              {
                id: 4,
                categoryId: 4,
                price: 4350,
                title: 'Проектор XGIMI Elfin',
                rate: 4.5,
                ball: 540,
                image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'
              },
              {
                id: 5,
                categoryId: 5,
                price: 5350,
                title: 'Проектор XGIMI Elfin',
                rate: 4.5,
                ball: 540,
                image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'
              },
              {
                id: 6,
                categoryId: 6,
                price: 6350,
                title: 'Проектор XGIMI Elfin',
                rate: 4.5,
                ball: 540,
                image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'
              },
            ],
          }
        },
        watch: {
          '$route.params.id': {
            immediate: true,
            handler() {
              //получение данных с API
            }
          }
        }
    }
</script>

<style scoped>

</style>