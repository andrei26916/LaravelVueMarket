<template>
  <div class="block_flex_inner_center">
    <div v-if="!this.products.length" class="none">
      <h1>Товары не найдены</h1>
    </div>
    <div class="card" v-for="product in products">
      <router-link :to="{name: 'product', params: {id: product.id}}">
        <el-image
            style="width: 100%; height: 100%"
            :src="product.image"></el-image>
      </router-link>
      <div class="priceAndFavorites">
        <h3>{{ product.price }} <span style="font-size: 16px">₽</span></h3>
        <a v-if="!isCheckFavorites(product)" @click="submitFavorites(product)" class="favorites"><i
            class="el-icon-s-flag"></i></a>
        <a v-else class="favorites_active" @click="removeFavourites(product.id)"><i class="el-icon-s-flag"></i></a>
      </div>
      <span style="color: #9e9e9e;font-size: 13px;">{{ product.ball }}&nbsp;баллов на Плюс</span>
      <el-rate v-model="product.rate" disabled/>
      <p>{{ product.title }}</p>
      <el-button v-if="!isCheck(product)" type="warning" @click="submit(product)">В корзину</el-button>
      <el-button v-else type="danger" @click="remove(product.id)">Убрать из корзины</el-button>
    </div>
  </div>

</template>

<script>
import {mapMutations} from 'vuex';
import {mapGetters} from 'vuex';

export default {
  name: "ProductsComponent",
  props: ['products'],
  methods: {
    ...mapMutations(['createBasket', 'removeBasket', 'createFavourites', 'removeFavourites']),
    ...mapGetters(['allBasket', 'allFavourites']),
    submit(product) {
      this.createBasket(product)
    },
    submitFavorites(product) {
      this.createFavourites(product)
    },
    remove(id) {
      this.removeBasket(id);
    },
    removeFavorites(id) {
      this.removeFavourites(id);
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
  },
}
</script>

<style scoped>
.card {
  width: 207px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  margin-right: 20px;
}

.card img {
  width: 100%;
  margin: 20px 0;
}

.card p {
  font-size: 15px;
  color: #626262;
}

.card h3 {
  padding: 0;
  margin: 0 0 5px;
}

.card p {
  margin: 10px 0;
  min-height: 35px;
}

.card button {
  margin-top: 10px;
  width: 100%;
}

.none {
  margin: 10% auto;
  color: #d9d9d9;
}

.priceAndFavorites {
  display: inline-flex;
  width: 100%;
  justify-content: space-between;
}

.favorites {
  transform: rotateZ(90deg);
  margin-right: 10px;
  font-size: 24px;
  cursor: pointer;
}

.favorites_active {
  transform: rotateZ(90deg);
  margin-right: 10px;
  font-size: 24px;
  cursor: pointer;
  color: #f44336;
}

.favorites_active:hover {
  color: #000000;
}

.favorites:hover {
  color: #f44336;
}


</style>