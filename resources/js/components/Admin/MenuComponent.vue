<template>

  <div class="menu">
    <el-menu
        default-active="1"
        class="el-menu-vertical-demo">
<!--        @open="handleOpen"-->
<!--        @close="handleClose">-->
      <router-link :to="{name: 'AdminPanel'}" >
        <el-menu-item index="1">
          <i class="el-icon-menu"></i>
          <span>Админпанель</span>
        </el-menu-item>
      </router-link>
      <router-link :to="{name: 'AdminOrders'}" >
        <el-menu-item index="2">
          <i class="el-icon-notebook-2"></i>
          <span>Список заказов</span>
        </el-menu-item>
      </router-link>
      <router-link :to="{name: 'AdminProducts'}" >
        <el-menu-item index="3">
          <i class="el-icon-goods"></i>
          <span>Список товаров </span>
        </el-menu-item>
      </router-link>

      <router-link :to="{name: 'AdminCategories'}" >
<!--        <el-menu-item index="4">-->
<!--          <i class="el-icon-files"></i>-->
<!--          <span>Категории </span>-->
<!--        </el-menu-item>-->
      </router-link>
      <el-submenu index="5">
        <template slot="title">
          <i class="el-icon-user"></i>
          <span>Пользователи</span>
        </template>
          <router-link :to="{name: 'AdminUsersCreate'}" >
              <el-menu-item index="5-1">
                  <i class="el-icon-edit"></i>
                  <span>Создать</span>
              </el-menu-item>
          </router-link>
        <router-link :to="{name: 'AdminUsers'}" >
            <el-menu-item index="5-2">
                <i class="el-icon-tickets"></i>
                <span>Список</span>
            </el-menu-item>
        </router-link>
      </el-submenu>
<!--      <el-submenu index="6">-->
<!--&lt;!&ndash;        <template slot="title">&ndash;&gt;-->
<!--&lt;!&ndash;          <i class="el-icon-brush"></i>&ndash;&gt;-->
<!--&lt;!&ndash;          <span>Дизайн главной страницы</span>&ndash;&gt;-->
<!--&lt;!&ndash;        </template>&ndash;&gt;-->
<!--&lt;!&ndash;        <el-menu-item index="5-1">&ndash;&gt;-->
<!--&lt;!&ndash;          <i class="el-icon-monitor"></i>&ndash;&gt;-->
<!--&lt;!&ndash;          <span>Изменить баннер</span>&ndash;&gt;-->
<!--&lt;!&ndash;        </el-menu-item>&ndash;&gt;-->
<!--      </el-submenu>-->
      <el-menu-item index="7">
        <i class="el-icon-close"></i>
        <span>Выход</span>
      </el-menu-item>
    </el-menu>
  </div>

</template>

<script>
import BreadcrumbComponent from './BreadcrumbComponent';

export default {
  name: "MenuComponent",
  components: {
    BreadcrumbComponent,
  }
}
</script>

<style scoped>
.menu{
  width: 250px;
  height: auto;
  display: block;
  margin-right: 10px;
}

.menu a {
  text-decoration: none;
}

</style>
