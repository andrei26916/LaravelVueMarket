<template>

  <div>
    <h1>Заказы</h1>
      <OrdersListComponents/>
  </div>

</template>

<script>
import OrdersListComponents from '../../components/OrdersListComponent'

export default {
  name: "AdminOrders",
  components: {
      OrdersListComponents,
  }
}
</script>

<style scoped>

</style>
