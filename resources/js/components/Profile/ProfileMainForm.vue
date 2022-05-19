<template>
  <el-form label-position="left" label-width="150px">
    <el-form-item label="Фамилия">
      <el-input :disabled="this.disabled" v-model="this.user.last_name" placeholder="Незаполненно"></el-input>
    </el-form-item>
    <el-form-item label="Имя">
      <el-input :disabled="this.disabled" v-model="this.user.first_name" placeholder="Незаполненно"></el-input>
    </el-form-item>
    <el-form-item label="Отчество">
      <el-input :disabled="this.disabled" v-model="this.user.father_name" placeholder="Незаполненно"></el-input>
    </el-form-item>
    <el-form-item label="Телефон">
      <el-input :disabled="this.disabled" v-model="this.user.phone" placeholder="Незаполненно"></el-input>
    </el-form-item>
    <el-form-item label="Никнейм">
      <el-input :disabled="this.disabled" v-model="this.user.login" placeholder="Незаполненно"></el-input>
    </el-form-item>
    <el-form-item label="E-mail">
      <el-input :disabled="this.disabled" v-model="this.user.email" placeholder="Незаполненно"></el-input>
    </el-form-item>
    <el-form-item label="Дата рождения">
      <el-input :disabled="this.disabled" v-model="this.user.birthDate"
                type="date"
                default-value="2010-10-01"></el-input>
    </el-form-item>
    <el-button v-if="this.disabled" @click="edit()" style="float: right" type="primary" plain>Изменить</el-button>
    <el-button v-else @click="save()" style="float: right" type="success">Сохранить</el-button>
  </el-form>
</template>

<script>
export default {
  name: "ProfileMainForm",
  props: ['user'],
  data(){
    return {
      disabled: true,
    }
  },
  methods: {
    edit(){
      this.disabled = !this.disabled;
    },
    save() {
      this.disabled = !this.disabled;
    },
  }
}
</script>

<style scoped>

</style>
