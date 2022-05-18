<template>
  <div>
    <div v-if="isAdmin()" class="admin_div_flex">
      <MenuComponent/>
      <div class="content_admin">
        <BreadcrumbComponent/>
        <router-view/>
      </div>
    </div>
    <div v-else>
      <HeaderComponent/>
      <router-view/>
    </div>
  </div>
</template>

<script>
import HeaderComponent from '../components/layouts/HeaderComponent';
import MenuComponent from '../components/layouts/Admin/MenuComponent';
import BreadcrumbComponent from '../components/layouts/Admin/BreadcrumbComponent';
import {mapGetters, mapMutations} from "vuex";
export default {
  name: "App",
  props: ['auth'],
  components: {
    HeaderComponent, MenuComponent, BreadcrumbComponent
  },
  data() {
      return {
          isAuth: 'test',
      }
  },
  async mounted() {
    await this.createUser({
      id: 1,
      login: 'andrei',
      email: 'andrei26916@mail.ru',
      birthDate: '1997-03-03',
      last_name: null,
      first_name: null,
      father_name: null,
      phone: '89997788356',
      role: 1,
      avatar: 'https://e7.pngegg.com/pngimages/109/949/png-clipart-computer-software-management-business-service-technical-support-sugarplum-miscellaneous-infographic.png',
    });
  },
  methods: {
    ...mapMutations(['createUser']),
    ...mapGetters(['getUser']),
    isAdmin(){
      let user = this.getUser();
      let path = this.$route.path;
      if (path.indexOf('admin') >= 0){
        if (user.role === 0){
          this.$router.push({ name: 'home' })
        }
        return true;
      }
      return false;
    }
  }
}
</script>

<style scoped>
.admin_div_flex{
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
}

</style>
