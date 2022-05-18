<template>
    <div>
      <div class="content">
        <h1>Корзина</h1>
      </div>
      <div class="content">
        <BasketComponent/>
      </div>
    </div>
</template>

<script>
    import BasketComponent from '../components/BasketComponent';
    export default {
        name: "Basket",
        components: {
            BasketComponent,
        }
    }
</script>

<style scoped>
    div{
        width: 100%;
    }

    h1{
        text-align: left;
    }

</style>