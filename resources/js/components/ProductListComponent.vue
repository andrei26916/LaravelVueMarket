<template>
    <div class="block_flex_inner_center">
        <div v-if="!this.products.length" class="none">
            <h1>Товары не найдены</h1>
        </div>
        <div class="card" v-for="product in products">
            <el-image v-for="image in product.images" :key="image.pivot.image_morph_id"
                style="width: 100%; height: 100%"
                :src="image.src"></el-image>
            <div class="priceAndFavorites">
                <h3>{{ product.price }} <span style="font-size: 16px">₽</span></h3>
            </div>
            <span style="color: #9e9e9e;font-size: 13px;">Категория:&nbsp <b>{{ product.category.name }}</b></span>
            <el-rate v-model="product.rate" disabled/>
            <p>{{ product.title }}</p>
            <el-button type="danger" size="mini" plain @click="remove(product.id)">Удалить</el-button>
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
  },
    methods: {
        remove(id){
            this.products = this.products.filter((item) => {return item.id != id});
            axios.delete('/api/product/' + id).then(response => (this.categories = response.data));
        }
    }
}
</script>

<style scoped>

.card {
    width: 207px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
    border: 1px solid #e7e7e7e6;
    padding: 15px;
    box-shadow: 1px 1px 5px 0 #e3e3e3;
    margin: 5px;
}

.card img {
    width: 100%;
    margin: 20px 0;
}

b{
    color: rgb(102 102 102);
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
