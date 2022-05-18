<template>
    <div>
        <div class="header">
            <div class="top_line">
                <router-link :to="{name: 'home'}">
                    <div class="logo">
                        <img width="50" alt="Vue logo" src="/img/logo.png">
                        <h1>HelloMarket</h1>
                    </div>
                </router-link>

                <div class="search">
                    <el-dropdown trigger="click">
                        <el-button>
                            <i class="el-icon-s-unfold"></i>
                            Категории
                        </el-button>
                        <el-dropdown-menu slot="dropdown" style="width: 99%;">
                            <div class="category">
                                <CategoriesComponent/>
                            </div>
                        </el-dropdown-menu>
                    </el-dropdown>
                    <el-input placeholder="Please input" v-model="search"></el-input>
                </div>

                <div class="info">
                    <router-link v-if="authorisation()" :to="{name: 'orders'}">
                        <div class="icon">
                            <i class="el-icon-notebook-2"></i>
                            <p>Заказы</p>
                        </div>
                    </router-link>
                    <router-link :to="{name: 'favourites'}">
                        <div class="icon">
                            <span v-if="countFavourites">{{countFavourites}}</span>
                            <i class="el-icon-collection-tag"></i>
                            <p>Избранное</p>
                        </div>
                    </router-link>
                    <router-link :to="{name: 'basket'}">
                        <div class="icon">
                            <span v-if="countBasket">{{countBasket}}</span>
                            <i class="el-icon-shopping-cart-full"></i>
                            <p>Корзина</p>
                        </div>
                    </router-link>

                    <el-dropdown trigger="click" v-if="authorisation()">
                        <div class="profile">
                          <el-avatar :size="50">
                            <img :src="this.getUser().avatar"/>
                          </el-avatar>
                        </div>
                        <el-dropdown-menu slot="dropdown">
                          <router-link style="text-decoration: none;" :to="{name: 'userSettings'}">
                            <el-dropdown-item class="clearfix"> <i class="el-icon-s-operation"></i> настройки</el-dropdown-item>
                          </router-link>
                            <el-dropdown-item class="clearfix"> <i class="el-icon-close"></i> выход</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>

                    <router-link v-if="!authorisation()" :to="{name: 'basket'}">
                      <div class="auth">
                        <p>Вход</p>
                      </div>
                    </router-link>

                    <router-link  v-if="!authorisation()" :to="{name: 'basket'}">
                      <div class="auth">
                        <p>Регистрация</p>
                      </div>
                    </router-link>

                </div>

            </div>
        </div>

        <section class="content">
            <slot/>
        </section>

    </div>
</template>

<script>
    import CategoriesComponent from '../components/CategoriesComponent';
    import {mapGetters} from 'vuex';
    export default {
        data() {
            return {
                search: '',
            }
        },
        name: "Index",
        computed: mapGetters(['countBasket', 'countFavourites']),
        methods: {
          ...mapGetters(['getUser']),
          authorisation(){
            return Object.keys(this.getUser()).length > 0;

          }
        },
        components: {
            CategoriesComponent,
        }
    }
</script>

<style scoped>
  .category{
    margin-left: 5vh;
  }

  .auth{
    margin-right: 1.5em;
    font-size: 13px;
    text-align: center;
    line-height: 0;
  }

  .auth p{
    line-height: 24px;
  }
</style>
