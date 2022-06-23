<template>
  <div>
    <div class="content">
        <ProductComponent :product="this.product"/>
    </div>
<!--    <div class="content">-->
<!--      <h1>С этим товаром покупают</h1>-->
<!--      <ProductsComponent :products="this.recommendations"/>-->
<!--    </div>-->
  </div>
</template>

<script>
    import ProductComponent from '../components/ProductComponent';
    import ProductsComponent from '../components/ProductsComponent';
    import axios from "axios";
    export default {
        name: "Product",
        components: {
            ProductComponent, ProductsComponent
        },
        data(){
          return {
            activeName: 'first',
            product: {},
            products: {
              id: 1,
              price: 350,
              title: 'Проектор XGIMI Elfin',
              description: 'Проводной геймпад для ПК и PlayStation 3 Defender Omega USB.\n' +
                  '                            прекрасная модель для начинающих геймеров. При доступной цене геймпад имеет все необходимые функциональные клавиши и комфортно лежит в руках;\n' +
                  '                            12 функциональных кнопок;\n' +
                  '                            2 аналоговых джойстика. Два мини джойстика позволяют играть в дополнительные игры, например, в футбольные симуляторы.\n' +
                  '                            8-позиционный переключатель видов;\n' +
                  '                            Эффект вибрации. Делает аварии и столкновения более реалистичными (игра должна поддерживать функцию вибрации игрового контроллера);\n' +
                  '                            Питание от порта USB.',
              rate: 2.5,
              ball: 540,
              images: [
                'https://c.dns-shop.ru/thumb/st1/fit/500/500/e3c0f578139091a82d4676bb6faef4c7/0a064994d0720dcd8d6e163d86c5b4f2e953dfd412070cea72e7766222e110d0.jpg.webp',
                'https://c.dns-shop.ru/thumb/st1/fit/500/500/e3c0f578139091a82d4676bb6faef4c7/0a064994d0720dcd8d6e163d86c5b4f2e953dfd412070cea72e7766222e110d0.jpg.webp',
                'https://c.dns-shop.ru/thumb/st1/fit/500/500/e3c0f578139091a82d4676bb6faef4c7/0a064994d0720dcd8d6e163d86c5b4f2e953dfd412070cea72e7766222e110d0.jpg.webp',
              ]
            },
            recommendations: [
              {
                id: 7,
                categoryId: 6,
                price: 6350,
                title: 'FFFFFFFFFF',
                rate: 4.5,
                ball: 540,
                image: 'https://avatars.mds.yandex.net/get-mpic/5235397/img_id5560564623219774984.png/5hq'
              },
            ],
          }
        },
        mounted() {
          axios.get('/api/product/' + this.$route.params.id)
              .then(response => (this.product = response.data))
        }
    }
</script>

<style scoped>
    h1{
      margin-top: 10vh;
      text-align: left;
    }
</style>
