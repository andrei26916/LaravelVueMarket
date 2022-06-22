<template>

    <el-form ref="form" v-model="user" label-width="220px">
        <el-form-item label="Фамилия">
            <el-input v-model="user.last_name" placeholder="Введите фамилию"></el-input>
        </el-form-item>
        <el-form-item label="Имя">
            <el-input v-model="user.first_name" placeholder="Введите имя"></el-input>
        </el-form-item>
        <el-form-item label="Отчество">
            <el-input v-model="user.father_name" placeholder="Введите отчество"></el-input>
        </el-form-item>
        <el-form-item label="Логин">
            <el-input v-model="user.login" placeholder="Введите логин"></el-input>
        </el-form-item>
        <el-form-item label="Почта">
            <el-input v-model="user.email" placeholder="Введите почту"></el-input>
        </el-form-item>
        <el-form-item label="Пароль">
            <el-input type="password" v-model="user.password" placeholder="Введите пароль"></el-input>
        </el-form-item>
        <el-form-item label="Телефон">
            <el-input v-model="user.phone" placeholder="Введите телефон"></el-input>
        </el-form-item>
        <el-form-item label="Роль" >
            <el-select placeholder="Выберите роль" v-model="user.role_id">
                <div v-for="role in this.roles">
                    <el-option :label="role.name" :value="role.id"></el-option>
                </div>
            </el-select>
        </el-form-item>
        <el-form-item>
            <el-button type="success" @click="save()">Сохранить</el-button>
        </el-form-item>
    </el-form>

</template>

<script>
export default {
name: "UserUpdateComponent",
    props: ['user'],
    data(){
        return {
            roles: []
        }
    },
    methods: {
        save(){
            axios.post('/api/user/' + this.user.id + '/update', this.user).then(response => (console.log(response.data)));
        }
    },
    mounted() {
        axios.get('/api/roles').then(response => (this.roles = response.data));
    }
}
</script>

<style scoped>

</style>
