<template>
  <div>
    <div class="product" v-for="product in products" :key="product.id">
      <div class="img"><img src="/favicon.ico"></div>
      <div class="info">
        <h3>{{ product.title }}</h3>
        <h5>Категория</h5>
        <p>{{ product.description }}</p>
        <h4>Цена: {{ product.price }} руб.</h4>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProductListComponent",
  props: ['products'],
  data(){
    return {
      rate: 5
    }
  }
}
</script>

<style scoped>

.product{
  display: flex;
  flex-wrap: nowrap;
  align-items: flex-start;
  justify-content: flex-start;
  align-content: space-around;
  margin: 20px;
  border: 1px solid #e7e7e7e6;
  padding: 15px;
  box-shadow: 1px 1px 5px 0 #e3e3e3;
}

.img{
  width: 150px;
  height: 150px;
  margin-right: 10px;
}
h3{
  margin: 0px;
}

h5{
  margin: 7px;
}

</style>