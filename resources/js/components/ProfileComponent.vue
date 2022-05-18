<template>
  <div>
    <el-tabs type="border-card">
      <el-tab-pane>
        <span slot="label"><i class="el-icon-user"></i> Основные</span>

        <div class="main">
          <div class="main_input">
            <ProfileMainForm :user="this.user" />
          </div>
          <div class="main_avatar">
            <ProfileAvatarForm/>
          </div>
        </div>

      </el-tab-pane>
      <el-tab-pane>
        <span slot="label"><i class="el-icon-unlock"></i> Безопасность</span>

        <ProfileResetPasswordForm />

      </el-tab-pane>
      <el-tab-pane>
        <span slot="label"><i class="el-icon-warning-outline"></i> Информация</span>
      </el-tab-pane>
    </el-tabs>
  </div>
</template>

<script>
  import ProfileMainForm from '../components/Profile/ProfileMainForm';
  import ProfileAvatarForm from '../components/Profile/ProfileAvatarForm';
  import ProfileResetPasswordForm from "../components/Profile/ProfileResetPasswordForm";
  export default {
    name: "UserInformationComponent",
    props: ['user'],
    components: {
      ProfileMainForm, ProfileAvatarForm, ProfileResetPasswordForm
    },
    data() {
      return {
        activeName: 'first',
      }
    },
    methods: {
      handleClick(tab, event) {
        console.log(tab, event);
      },
    }
  }
</script>

<style scoped>
  .main{
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: space-around;
    flex-direction: row;
  }

  .main .main_input {
    max-width: 600px;
    width: 100%;
  }

</style>