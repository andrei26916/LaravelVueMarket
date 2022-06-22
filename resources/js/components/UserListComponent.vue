<template>
    <div>
        <h1>Список пользователей</h1>
        <template>
            <el-table
                :data="this.users.filter(data => !search || data.email.toLowerCase().includes(search.toLowerCase()))"
                style="width: 100%">
                <el-table-column
                    prop="login"
                    label="Логин"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="email"
                    label="Почта"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="phone"
                    label="Телефон">
                </el-table-column>
                <el-table-column
                    prop="last_name"
                    label="Фамилия">
                </el-table-column>
                <el-table-column
                    prop="first_name"
                    label="Имя">
                </el-table-column>
                <el-table-column
                    prop="father_name"
                    label="Отчество">
                </el-table-column>
                <el-table-column
                    label="Аватарка">
                    <template slot-scope="scope">
                        <el-avatar shape="square" :src="scope.row.avatar_url"></el-avatar>
                    </template>
                </el-table-column>
                <el-table-column
                    align="right">
                    <template slot="header" slot-scope="scope">
                        <el-input
                            v-model="search"
                            size="mini"
                            placeholder="Поиск"/>
                    </template>
                    <template slot-scope="scope">
                        <el-button
                            size="mini"
                            @click="edit(scope.$index, scope.row)">Изменить</el-button>
                        <el-button
                            size="mini"
                            type="danger"
                            @click="remove(scope.$index, scope.row)">Удалить</el-button>
                    </template>
                </el-table-column>
            </el-table>
        </template>
    </div>
</template>

<script>
export default {
    name: "UserListComponent",
    props: ['users'],
    data() {
        return {
            // users: [
            //     {
            //         login: 'aa',
            //         email: 'aa@mail.ru',
            //         phone: '899989889889',
            //         lats_name: 'aaa',
            //         first_name: 'bb',
            //         father_name: 'ddd',
            //         avatar_url: '/storage/users/f4pcxFbxHdivQGNXypHc80ogjFDdRmHQfm3KR8AN.jpg'
            //     },
            //     {
            //         login: 'bbb',
            //         email: 'aa@mail.ru',
            //         phone: '899989889889',
            //         lats_name: 'aaa',
            //         first_name: 'bb',
            //         father_name: 'ddd',
            //         avatar_url: '/storage/users/f4pcxFbxHdivQGNXypHc80ogjFDdRmHQfm3KR8AN.jpg'
            //     }
            // ],
            search: '',
        }
    },
    methods: {
        remove(index, row){
            axios.delete('/api/user/' + row.id).then(response => (console.log(response.data)));
            this.users = this.users.filter((num, i) => i !== index)
        },
        edit(index, row){
            this.$router.push({name: 'AdminUsersUpdate', params: {id: row.id}})
        }
    }
}
</script>

<style scoped>

</style>
