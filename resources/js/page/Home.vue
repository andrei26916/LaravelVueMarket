<template>
    <div>
        <BannerComponent/>
      <div v-for="(category,key) in this.popularCategory ">
        <div class="content">
          <h1 v-if="key === 0" style="margin-top: 0;">{{ category.name }}</h1>
          <h1 v-else>{{ category.name }}</h1>
          <ProductsComponent :products="category.products"/>
        </div>
      </div>
    </div>
</template>

<script>
import ProductsComponent from '../components/ProductsComponent';
import BannerComponent from '../components/layouts/BannerComponent';
import axios from "axios";

export default {
    name: "Home",
    components: {
        ProductsComponent, BannerComponent
    },
    data(){
      return {
        categories: [],
        popularCategory: [
          {
            name: 'Спиннинговые',
            products: [
              {
                id: 1,
                categoryId: 1,
                price: 4172,
                title: 'Спиннинг монолитный Balzer Magna Magic Silver Legend Tele Spin 10-40г 3,0м 11524 300',
                rate: 2.5,
                ball: 540,
                image: 'https://i4.stat01.com/2/6842/168419498/eb5c13/spinning-monolitnyj-balzer-magna-magic-silver-legend-tele-spin-10-40g-3-0m-11524-300.jpg'
              },
              {
                id: 2,
                categoryId: 2,
                price: 4274,
                title: 'Спиннинг телескопический Balzer Magna Magic Silver Legend Tele Mini Spin 15-45г 2,70м 11523 270',
                rate: 4.9,
                ball: 540,
                image: 'https://i4.stat01.com/2/6842/168419498/eb5c13/spinning-monolitnyj-balzer-magna-magic-silver-legend-tele-spin-10-40g-3-0m-11524-300.jpg'
              },
              {
                id: 3,
                categoryId: 3,
                price: 4658,
                title: 'Спиннинг телескопический Balzer Diabolo X Tele Spin 3,3 м 20-75 г',
                rate: 4.5,
                ball: 540,
                image: 'https://i4.stat01.com/2/6842/168419498/eb5c13/spinning-monolitnyj-balzer-magna-magic-silver-legend-tele-spin-10-40g-3-0m-11524-300.jpg'
              },
              {
                id: 4,
                categoryId: 4,
                price: 3407,
                title: 'Спиннинг телескопический Balzer Diabolo X Tele Spin 2,1 м 10-45 г',
                rate: 4.5,
                ball: 540,
                image: 'https://i4.stat01.com/2/6842/168419498/eb5c13/spinning-monolitnyj-balzer-magna-magic-silver-legend-tele-spin-10-40g-3-0m-11524-300.jpg'
              },
              {
                id: 5,
                categoryId: 5,
                price: 3395,
                title: 'Спиннинг телескопический Balzer Diabolo X Tele Mini Spin 2,1 м 15-50',
                rate: 4.5,
                ball: 540,
                image: 'https://i3.stat01.com/2/5474/154735032/eb5c13/spinning-monolitnyj-balzer-magna-magic-silver-legend-tele-mini-spin-15-45g-2-10m-11523-210.jpg'
              },
              {
                id: 6,
                categoryId: 6,
                price: 4258,
                title: 'Спиннинг телескопический Balzer Diabolo X Tele Mini Spin 2,7 м 15-50 г',
                rate: 4.5,
                ball: 540,
                image: 'https://i4.stat01.com/2/3422/134216820/eb5c13/spinning-teleskopicheskij-diabolo-x-tele-mini-spin-2-7-m-15-50-g.jpg'
              },
            ],
          },
          {
            name: 'Фидерные',
            products: [
              {
                id: 7,
                categoryId: 6,
                price: 8554,
                title: 'Удилище штекерное DAIWA Ninja-X Feeder 3.60 m 80-220 g',
                rate: 5.5,
                ball: 1040,
                image: 'https://i1.stat01.com/2/748/107477388/eb5c13/spinning-shtekernyj-daiwa-ninja-spin-3-00-m-30-60-g.jpg'
              },
              {
                id: 8,
                categoryId: 6,
                price: 8554,
                title: 'Спиннинг телескопический DAIWA Black Widow Tele Feeder 3.60m до 100г',
                rate: 5.5,
                ball: 1040,
                image: 'https://i4.stat01.com/2/5898/158973392/eb5c13/spinning-shtekernyj-daiwa-black-widow-feeder-3-30m-do-100g.jpg'
              },
            ]
          }
        ]
      }
    },
    mounted() {
      axios.get('http://127.0.0.1:8000/api/products/category')
          .then(response => (this.categories = response.data))
    }
}
</script>

<style scoped>
  h1{
    margin-top: 10vh;
    text-align: left;
  }

</style>