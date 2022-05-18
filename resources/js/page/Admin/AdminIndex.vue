<template>
  <div>
    <h1>Админ Панель</h1>
    <div class="statistics">
      <div class="categories block_style">
        <p>Заказы по категориям</p>
        <div v-for="category in statisticCategories" style="display: flex; margin-bottom: 10px;">
          <span style="margin-right: 10px; color: #0006;">{{ category.name }}</span>
          <el-progress :percentage="category.order_count"  :format="format" style="width: 100%"></el-progress>
        </div>
      </div>
      <div class="block_style" >
        <h1>Заказов</h1>
        <el-progress type="circle" :percentage="25" color="#5cb87a"></el-progress>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: "AdminIndex",
  data(){
    return {
      statisticCategories: [
        {
          name: 'phone',
          order_count: 3,
        },
        {
          name: 'phone',
          order_count: 3,
        },
        {
          name: 'phone',
          order_count: 3,
        }
      ]
    }
  }
}
</script>

<style scoped>
.statistics{
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
}

.block_style{
  border: 1px solid #e7e7e7e6;
  padding: 15px;
  box-shadow: 1px 1px 5px 0 #e3e3e3;
  margin: 20px;
}
.categories{
  width: 550px;
}

.categories p{
  font-size: 20px;
  margin: 0px;
  padding-top: 3px;
  padding-bottom: 7px;
  color: #000000b8;
  padding-left: 12px;
}

/*width: 450px;*/
/*border: 1px solid #e3e3e3;*/
/*padding: 5px;*/
/*box-shadow: 1px 1px 5px 0px #cfcfcf;*/

</style>