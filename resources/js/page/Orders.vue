<template>
    <div>
      <div class="content">
        <h1>Заказы</h1>
      </div>
      <div class="content">
        <OrdersComponent/>
      </div>
    </div>
</template>

<script>
    import OrdersComponent from '../components/OrdersComponent';
    export default {
        name: "Orders",
        components: {
            OrdersComponent,
        }
    }
</script>

<style scoped>
    h1{
        text-align: left;
    }

</style>