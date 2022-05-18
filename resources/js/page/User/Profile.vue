<template>
  <div>
    <div class="content">
      <UserInformationComponent :user="this.getUser()"/>
    </div>
  </div>
</template>

<script>
  import UserInformationComponent from '../../components/ProfileComponent';
  import {mapGetters} from "vuex";
  export default {
    name: "Settings",
    components: {
      UserInformationComponent
    },
    methods: {
      ...mapGetters(['getUser']),
    }
  }
</script>

<style scoped>
  div{
    width: 100%;
  }
</style>